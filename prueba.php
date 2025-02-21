public function consultLeadershipandRelationshipCriticality(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'measurement_id' => ['required', 'numeric'],
            'company_id' => ['nullable'],
            'city' => ['nullable'],
            'position' => ['nullable'],
            'type_questionnaire' => ['nullable'],
            'first_level' => ['nullable'],
            'second_level' => ['nullable'],
            'third_level' => ['nullable'],
            'fourth_level' => ['nullable'],
            'fifth_level' => ['nullable'],
            'sixth_level' => ['nullable'],
            'seventh_level' => ['nullable'],
            'eighth_level' => ['nullable'],
            'leadership_risk' => ['nullable'],
            'intrawork_level_characteristics' => ['nullable'],
            'intrawork_level_relations' => ['nullable'],
            'intrawork_level_feedback' => ['nullable'],
            'intrawork_level_relationship' => ['nullable'],
            'intrawork_level_leadership' => ['nullable'],
        ]);
    
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
    
        $query = IntraWorkConsolidated::where('psychosocial_intrawork_consolidated.measurement_id', $request->measurement_id);
    
        $query->when($request->company_id, fn($q) => $q->where('psychosocial_intrawork_consolidated.company_id', $request->company_id));
        $query->when($request->city, fn($q) => $q->where('psychosocial_intrawork_consolidated.city', $request->city));
        $query->when($request->position, fn($q) => $q->where('psychosocial_intrawork_consolidated.position', $request->position));
        $query->when($request->type_questionnaire, fn($q) => $q->where('psychosocial_intrawork_consolidated.type_questionnaire', $request->type_questionnaire));
    
        for ($i = 1; $i <= 8; $i++) {
            $level = "level{$i}";
            if ($request->$level) {
                $query->where("psychosocial_intrawork_consolidated.{$level}", $request->$level);
            }
        }
    
        $riskFields = [
            'leadership_risk' => 'intrawork_domain_leadership',
            'intrawork_level_characteristics' => 'intrawork_dimesion_characteristics',
            'intrawork_level_relations' => 'intrawork_dimesion_relations',
            'intrawork_level_feedback' => 'intrawork_dimesion_feedback',
            'intrawork_level_relationship' => 'intrawork_dimesion_relationship',
        ];
    
        foreach ($riskFields as $inputField => $dbField) {
            if ($request->$inputField) {
                $query->when($request->$inputField, function ($q, $value) use ($dbField) {
                    switch ($value) {
                        case 'Sin riesgo':
                            return $q->where("{$dbField}_no_risk", '>', 0);
                        case 'R bajo':
                            return $q->where("{$dbField}_low_risk", '>', 0);
                        case 'R medio':
                            return $q->where("{$dbField}_medium_risk", '>', 0);
                        case 'R alto':
                            return $q->where("{$dbField}_high_risk", '>', 0);
                        case 'R muy alto':
                            return $q->where("{$dbField}_very_high_risk", '>', 0);
                    }
                });
            }
        }
    
        $filtersCriticality = $query->select('psychosocial_intrawork_consolidated.position', DB::raw('count(*) as total_positions'))
            ->groupBy('psychosocial_intrawork_consolidated.position')
            ->get();
    
        $counterCriticality = $filtersCriticality->count();
    
        if ($counterCriticality <= 0) {
            return response()->json(["No se han encontrado datos."], 404);
        }
    
        $results = [];
        foreach ($filtersCriticality as $Criticality) {
            $position = $Criticality->position;
            $totalByposition = $Criticality->total_positions;
            $percentage = ($totalByposition / $counterCriticality) * 100;
    
            $results[] = [
                "datasets" => [
                    'proceso / área' => $position,
                    'porcentaje' => round($percentage, 2),
                    'total position' => $totalByposition,
                ]
            ];
        }
    
        if ($results) {
            return response()->json(['data' => $results], 200);
        } else {
            return response()->json(['error' => "No se han encontrado datos."], 404);
        }
    }