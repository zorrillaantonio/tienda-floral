<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFlowerArrangementsRequest;
use App\Http\Requests\UpdateFlowerArrangementsRequest;
use App\Repositories\FlowerArrangementsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\{
    Category,
    FlowerArrangements
};
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class FlowerArrangementsController extends AppBaseController
{
    /** @var  FlowerArrangementsRepository */
    private $flowerArrangementsRepository;

    public function __construct(FlowerArrangementsRepository $flowerArrangementsRepo)
    {
        $this->flowerArrangementsRepository = $flowerArrangementsRepo;
    }

    /**
     * Display a listing of the FlowerArrangements.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $flowerArrangements = $this->flowerArrangementsRepository->orderBy('created_at','desc')->paginate(10);

        return view('flower_arrangements.index')
            ->with('flowerArrangements', $flowerArrangements);
    }

    /**
     * Show the form for creating a new FlowerArrangements.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::orderBy('created_at','desc')->pluck('title','id');

        return view('flower_arrangements.create',['categories' => $categories]);
    }

    /**
     * Store a newly created FlowerArrangements in storage.
     *
     * @param CreateFlowerArrangementsRequest $request
     *
     * @return Response
     */
    public function store(CreateFlowerArrangementsRequest $request)
    {
        $input = $request->all();

        $flowerArrangement = $this->flowerArrangementsRepository->create($input);

        foreach ($request->photos as $key => $photo) {

            if (file_exists($photo)) {
                $flowerArrangement
                    ->addMedia($photo)
                    ->preservingOriginal()
                    ->toMediaCollection();
            }
        }

        Flash::success('Arreglos Florales saved successfully.');

        return redirect(route('flower-arrangements.index'));
    }

    /**
     * Display the specified FlowerArrangements.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $flowerArrangements = $this->flowerArrangementsRepository->find($id);

        if (empty($flowerArrangements)) {
            Flash::error('Arreglos Florales not found');

            return redirect(route('flower-arrangements.index'));
        }

        return view('flower_arrangements.show')->with('flowerArrangements', $flowerArrangements);
    }

    /**
     * Show the form for editing the specified FlowerArrangements.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $flowerArrangements = $this->flowerArrangementsRepository->find($id);

        if (empty($flowerArrangements)) {
            Flash::error('Arreglos Florales not found');

            return redirect(route('flower-arrangements.index'));
        }

        $categories = Category::orderBy('created_at','desc')->pluck('title','id');

        return view('flower_arrangements.edit',['categories' => $categories, 'edit' => true])->with('flowerArrangements', $flowerArrangements);
    }

    /**
     * Update the specified FlowerArrangements in storage.
     *
     * @param int $id
     * @param UpdateFlowerArrangementsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFlowerArrangementsRequest $request)
    {
        $flowerArrangements = $this->flowerArrangementsRepository->find($id);

        if (empty($flowerArrangements)) {
            Flash::error('Arreglos Florales not found');

            return redirect(route('flower-arrangements.index'));
        }

        $flowerArrangements = $this->flowerArrangementsRepository->update($request->all(), $id);
        // dd($request->all());
         if ($request->hasFile('photos')) {
           foreach ($request->photos as $key => $photo) {
                if (file_exists($photo)) {
                    $flowerArrangements
                        ->addMedia($photo)
                        ->preservingOriginal()
                        ->toMediaCollection();
                }
            }
        }

        Flash::success('Arreglos Florales updated successfully.');

        return redirect(route('flower-arrangements.index'));
    }

    /**
     * Remove the specified FlowerArrangements from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $flowerArrangements = $this->flowerArrangementsRepository->find($id);

        if (empty($flowerArrangements)) {
            Flash::error('Arreglos Florales not found');

            return redirect(route('flower-arrangements.index'));
        }

        $this->flowerArrangementsRepository->delete($id);

        Flash::success('Arreglos Florales deleted successfully.');

        return redirect(route('flower-arrangements.index'));
    }


    public function chageActive(Request $request)
    {
        $flowerArrangement = $this->flowerArrangementsRepository->find($request->id);

        if (empty($flowerArrangement)) {
            return response()->json(['message' => 'Arreglos Florales not found', 'status' => false],404);
        }

        $flowerArrangement->is_active = $request->value ? 0 : 1;
        $flowerArrangement->save();

        return response()->json(['value' => $flowerArrangement->is_active, 'status' => true],200);
    }

    public function deleteFile(Request $request)
    {
        $flowerArrangement = $this->flowerArrangementsRepository->find($request->arrangement_id);

        if (empty($flowerArrangement)) {
            return response()->json(['message' => 'Arreglos Florales not found', 'status' => false],404);
        }

        $media = Media::find($request->media_id);

        if (empty($media)) {
           return response()->json(['message' => 'Media not found', 'status' => false],404);

        }

        $media->delete();
        return response()->json(['message' => 'Media delete', 'status' => true],200);
    }
}
