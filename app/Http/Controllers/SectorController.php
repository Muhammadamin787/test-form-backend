<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSectorRequest;
use App\Http\Resources\SectorResource;
use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SectorController extends Controller
{
    /**
     * Display all categories
     *
     * This method is used to display all categories.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parentSectors = DB::table('sectors')->where('parent_sector_id', null)->get();

        foreach ($parentSectors as $sector) {
            $subSectors = $this->makeIt($sector);
            $sector->children = $subSectors;
        }

        return $parentSectors;
    }

    private function makeIt($sector)
    {
        $id = $sector->id;
        $foundSectors = DB::table('sectors')->where('parent_sector_id', $id)->get();

        if (count($foundSectors) > 0) {
            foreach ($foundSectors as $sector) {
                $subSectors = $this->makeIt($sector);
                $sector->children = $subSectors;
            }
        }

        return $foundSectors;
    }

    /**
     * Store a newly created category in storage.
     *
     * This method is used to create a new category.
     * @return \Illuminate\Http\Response
     * @param  \App\Http\Requests\StoreSectorRequest  $request
     */
    public function store(StoreSectorRequest $request)
    {
        $sector = Sector::create($request->only([
            'name',
            'parent_sector_id'
        ]));

        return new SectorResource($sector);
    }

    /**
     * DIsplay single category
     *
     * This method is used to display a single category.
     * @return \Illuminate\Http\Response
     */

    // * @param  \App\Models\Category  $category
    public function show($id)
    {
        // $category = Category::findOrFail($id);
        // return new CategoryResource($category);
    }

    /**
     * Update the specified category in storage.
     *
     * This method is used to update an existing category.
     * @return \Illuminate\Http\Response
     */
    // * @param  \App\Models\Category  $category
    // * @param  \App\Http\Requests\UpdateCategoryRequest  $request
    // public function update( $request, $id)
    // {
    //     // $category = Category::findOrFail($id);

    //     // $category->update($request->only('name'));

    //     // return new CategoryResource($category);
    // }

    /**
     * Remove the specified category from storage.
     *
     * This method is used to delete an existing category.
     * @return \Illuminate\Http\Response
     */

    // * @param  \App\Models\Category  $category
    public function destroy(Request $request)
    {
        $ids = $request->getContent();

        // foreach (json_decode($ids) as $id) {
        //     $type = Category::findOrFail($id);
        //     $type->delete();
        // }
    }
}
