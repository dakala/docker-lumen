<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

trait RestfulActions
{
    /**
     * Get a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $model = self::MODEL;
        return $this->output(Response::HTTP_OK, $model::all());
    }

    /**
     * Get a single resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $model = self::MODEL;
        $item = $model::find($id);

        $status = is_null($item) ? Response::HTTP_NOT_FOUND : Response::HTTP_OK;

        return $this->output($status, $item);
    }

    /**
     * Create a resource.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $model = self::MODEL;
        return $this->output(Response::HTTP_CREATED, $model::create($request->all()));
    }

    /**
     * Update a resource.
     *
     * @param Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $model = self::MODEL;
        $item = $model::find($id);

        if (is_null($item)) {
            $status = Response::HTTP_NOT_FOUND;
        } else {
            $item->update($request->all());
            $status = Response::HTTP_OK;
        }

        return $this->output($status, $item);
    }

    /**
     * Delete a resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $model = self::MODEL;
        $item = $model::find($id);

        if (is_null($item)) {
            $status = Response::HTTP_NOT_FOUND;
        } else {
            $model::destroy($id);
            $status = Response::HTTP_OK;
        }

        return $this->output($status);
    }

    /**
     * Get the output of a JSON response.
     *
     * @param string $status
     * @param array $data
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function output($status, $data = [])
    {
        return response()->json($data, $status);
    }
}
