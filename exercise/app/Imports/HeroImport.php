<?php

namespace App\Imports;

use App\Models\Hero;
use App\Models\Publisher;
use App\Models\Race;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class HeroImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            $publisher_id = Publisher::where('name', '=', $row['publisher'])->value('id');
            if ($row['publisher'] && is_null($publisher_id)) {
                $publisher_id = Publisher::create(['name'=> $row['publisher']])->id;
            }

            $race_id = Race::where('name', '=', $row['race'])->value('id');
            if ($row['race'] && is_null($race_id)) {
                $race_id = Race::create(['name'=> $row['race']])->id;
            }

            if(!Hero::where('id', '=', $row['id'])->exists()){
                Hero::create([
                    'id' => $row['id'],
                    'name'=> $row['name'],
                    'fullName'=> $row['fullname'],
                    'strength'=> $row['strength'],
                    'speed'=> $row['speed'],
                    'durability'=> $row['durability'],
                    'power'=> $row['power'],
                    'combat'=> $row['combat'],
                    'race_id'=> $race_id,
                    'height0'=> $row['height0'],
                    'height1'=> $row['height1'],
                    'weight0'=> $row['weight0'],
                    'weight1'=> $row['weight1'],
                    'eyeColor'=> $row['eyecolor'],
                    'hairColor'=> $row['haircolor'],
                    'publisher_id'=> $publisher_id,
                ]);
            }

        }
    }
}
