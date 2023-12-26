<?php

namespace Database\Seeders;

use App\Models\Sector;
use Illuminate\Database\Seeder;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sectors = [
            [
                'name' => 'Manufacturing',
                'children' => [
                    ['name' => 'Construction materials', 'children' => null],
                    [
                        'name' => 'Electronics and Optics',
                        'children' => null,
                    ],
                    [
                        'name' => 'Food and Beverage',
                        'children' => [
                            ['name' => 'Bakery &amp; confectionery products', 'children' => null],
                            ['name' => 'Beverages', 'children' => null],
                            ['name' => 'Fish &amp; fish products', 'children' => null],
                            ['name' => 'Meat &amp; meat products', 'children' => null],
                            ['name' => 'Milk &amp; dairy products', 'children' => null],
                            ['name' => 'Other', 'children' => null],
                            ['name' => 'Sweets &amp; snack food', 'children' => null],
                        ]
                    ],
                    [
                        'name' => 'Furniture',
                        'children' => [
                            ['name' => 'Bathroom/sauna', 'children' => null],
                            [
                                'name' => 'Office',
                                'children' => null,
                            ],
                            ['name' => 'Other (Furniture)', 'children' => null],
                            [
                                'name' => 'Outdoor',
                                'children' => null,
                            ],
                            [
                                'name' => 'Project furniture',
                                'children' => null,
                            ]
                        ]
                    ],
                    [
                        'name' => 'Machinery',
                        'children' => [
                            ['name' => 'Machinery components', 'children' => null],
                            [
                                'name' => 'Machinery equipment/tools',
                                'children' => null,
                            ],
                            [
                                'name' => 'Manufacture of machinery',
                                'children' => null,
                            ],
                            [
                                'name' => 'Maritime',
                                'children' => [
                                    ['name' => 'Aluminium and steel workboats', 'children' => null],
                                    ['name' => 'Boat/Yacht building', 'children' => null],
                                    ['name' => 'Ship repair and conversion', 'children' => null],
                                    ['name' => 'Aluminium', 'children' => null],
                                ],
                            ],
                            [
                                'name' => 'Metal structures',
                                'children' => null,
                            ],
                            [
                                'name' => 'Other',
                                'children' => null,
                            ],
                            [
                                'name' => 'Repair and maintenance service',
                                'children' => null,
                            ],
                        ]
                    ],
                    [
                        'name' => 'Metalworking',
                        'children' => [
                            ['name' => 'Construction of metal structures', 'children' => null],
                            [
                                'name' => 'Houses and buildings',
                                'children' => null,
                            ],
                            [
                                'name' => 'Metal products',
                                'children' => null,
                            ],
                            [
                                'name' => 'Metal works',
                                'children' => [
                                    ['name' => 'CNC-machining', 'children' => null],
                                    ['name' => 'Forgings, Fasteners', 'children' => null],
                                    ['name' => 'Gas, Plasma, Laser cutting', 'children' => null],
                                    ['name' => 'MIG, TIG, Aluminum welding', 'children' => null],
                                ],
                            ],
                        ]
                    ],
                    [
                        'name' => 'Plastic and Rubber',
                        'children' => [
                            ['name' => 'Packaging', 'children' => null],
                            [
                                'name' => 'Plastic goods',
                                'children' => null,
                            ],
                            [
                                'name' => 'Plastic processing technology',
                                'children' => [
                                    [
                                        'name' => 'Blowing',
                                        'children' => null,
                                    ],
                                    [
                                        'name' => 'Moulding',
                                        'children' => null,
                                    ],
                                    [
                                        'name' => 'Plastics welding and processing',
                                        'children' => null,
                                    ],
                                ],
                            ],
                            ['name' => 'Plastic profiles', 'children' => null],
                        ],
                        [
                            'name' => 'Printing',
                            'children' => [
                                ['name' => 'Advertising', 'children' => null],
                                ['name' => 'Labelling and packaging printing', 'children' => null],
                            ],
                        ],
                        [
                            'name' => 'Textile and Clothing',
                            'children' => [
                                ['name' => 'Clothing', 'children' => null],
                                ['name' => 'Textile', 'children' => null],
                            ],
                        ],
                        [
                            'name' => 'Wood',
                            'children' => [
                                ['name' => 'Other (Wood)', 'children' => null],
                                ['name' => 'Wooden building materials', 'children' => null],
                                ['name' => 'Wooden houses', 'children' => null],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Other',
                'children' => [
                    ['name' => 'Creative industries', 'children' => null],
                    ['name' => 'Energy technology', 'children' => null],
                    ['name' => 'Environment', 'children' => null]
                ]
            ],
            [
                'name' => 'Service',
                'children' => [
                    ['name' => 'Business services', 'children' => null],
                    ['name' => 'Engineering', 'children' => null],
                    [
                        'name' => 'Information Technology and Telecommunications',
                        'children' => [
                            ['name' => 'Data processing, Web portals, E-marketing', 'children' => null],
                            ['name' => 'Programming, Consultancy', 'children' => null],
                            ['name' => 'Software, Hardware', 'children' => null],
                            ['name' => 'Telecommunications', 'children' => null],
                        ],
                    ],
                    ['name' => 'Tourism', 'children' => null],
                    ['name' => 'Translation services', 'children' => null],
                    [
                        'name' => 'Transport and Logistics',
                        'children' => [
                            ['name' => 'Air', 'children' => null],
                            ['name' => 'Rail', 'children' => null],
                            ['name' => 'Road', 'children' => null],
                            ['name' => 'Water', 'children' => null],
                        ],
                    ],
                ]
            ],
        ];

        foreach ($sectors as $sectorData) {
            $this->createSector($sectorData);
        }
    }

    private function createSector($sectorData, $parentSectorId = null)
    {
        $sector = Sector::create([
            'name' => $sectorData['name'],
            'parent_sector_id' => $parentSectorId,
        ]);

        if (!empty($sectorData['children'])) {
            foreach ($sectorData['children'] as $childData) {
                $this->createSector($childData, $sector->id);
            }
        }
    }
}
