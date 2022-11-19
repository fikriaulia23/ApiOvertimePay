<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(title="Kledo App", version="0.1")
 *
 *
     * @OA\Get (
     *     path="/api/employee",
     *     tags={"Employee"},
     *     @OA\Response(
     *         response=200,
     *         description="success",
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 type="array",
     *                 property="rows",
     *                 property="s",
     *                 property="gf",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(
     *                         property="_id",
     *                         type="number",
     *                         example="1"
     *                     ),
     *                     @OA\Property(
     *                         property="title",
     *                         type="string",
     *                         example="example title"
     *                     ),
     *                     @OA\Property(
     *                         property="content",
     *                         type="string",
     *                         example="example content"
     *                     ),
     *                     @OA\Property(
     *                         property="updated_at",
     *                         type="string",
     *                         example="2021-12-11T09:25:53.000000Z"
     *                     ),
     *                     @OA\Property(
     *                         property="created_at",
     *                         type="string",
     *                         example="2021-12-11T09:25:53.000000Z"
     *                     )
     *                 )
     *             )
     *         )
     *     )
     * )
     * Employee
     * @OA\Post (
     * path="/api/employee/store",
     *     tags={"Employee"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="title",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="content",
     *                          type="string"
     *                      )
     *                 ),
     *                 example={
     *                     "name":"Full name",
     *                     "salary":2000000
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="success", type="bool", example=true),
     *              @OA\Property(property="code", type="integer", example=201),
     *              @OA\Property(property="message", type="string", example="Added Employee Successfully"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="invalid",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="The given data was invalid."),
     *              @OA\Property(type="array",
     *                 property="errors",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(
     *                         property="name",
     *                         type="string",
     *                         example="The name has already been taken."
     *                     )
     *                 )
     *             )
     *         )
     *      )
     * )
     * Settings
     * @OA\Patch (
     * path="/api/settings",
     *     tags={"Settings"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="key",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="value",
     *                          type="integer"
     *                      )
     *                 ),
     *                 example={
     *                     "key":"overtime_method",
     *                     "value":1
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="success", type="bool", example=true),
     *              @OA\Property(property="code", type="integer", example=200),
     *              @OA\Property(property="message", type="string", example="Update setting successfully"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="invalid",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="The given data was invalid."),
     *              @OA\Property(type="array",
     *                 property="errors",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(
     *                         property="value",
     *                         type="string",
     *                         example="TThe selected value is invalid."
     *                     )
     *                 )
     *             )
     *         )
     *      )
     * )
     *
     * Overtimes
     * @OA\Post (
     * path="/api/overtimes",
     *     tags={"Overtimes"},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                      type="object",
     *                      @OA\Property(
     *                          property="employee_id",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="date",
     *                          type="string",
     *                          format="date"
     *                      ),
     *                      @OA\Property(
     *                          property="time_started",
     *                          type="string",
     *                          format="time"
     *                      ),
     *                      @OA\Property(
     *                          property="time_ended",
     *                          type="string",
     *                          format="time"
     *                      )
     *                 ),
     *                 example={
     *                     "employee_id":"1",
     *                     "date":"2022-11",
     *                     "time_started":"00:00",
     *                     "time_ended":"02:00"
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="success",
     *          @OA\JsonContent(
     *              @OA\Property(property="success", type="bool", example=true),
     *              @OA\Property(property="code", type="integer", example=201),
     *              @OA\Property(property="message", type="string", example="Added overtime successfully"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="invalid",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="The given data was invalid."),
     *              @OA\Property(type="array",
     *                 property="errors",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(
     *                         property="date",
     *                         type="string",
     *                         example="The date has already been taken."
     *                     )
     *                 )
     *             )
     *         )
     *      )
     * )
     *  @OA\Get (
     *     path="/api/overtime-pays/calculate",
     *     tags={"Overtimes"},
     *     @OA\Parameter(
     *         in="path",
     *         name="date",
     *         required=true,
     *         description="YYYY-MM",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="success",
     *         @OA\JsonContent(
     *              @OA\Property(property="success", type="bool", example=true),
     *              @OA\Property(property="code", type="integer", example=201),
     *              @OA\Property(type="array", property="message",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(property="id", type="integer", example=1),
     *                     @OA\Property(property="name", type="string", example="Bardi"),
     *                     @OA\Property(property="salary", type="integer", example=2000000),
     *                     @OA\Property(property="created_at", type="string", example="2022-11-19T02:46:39.000000Z"),
     *                     @OA\Property(property="updated_at", type="string", example="2022-11-19T02:46:39.000000Z"),
     *                     @OA\Property(property="overtime_duration", type="integer", example=3),
     *                     @OA\Property(property="amount", type="integer", example=30000),
     *                          @OA\Property(type="array", property="overtimes",
     *                              @OA\Items(
     *                                  type="object",
     *                                  @OA\Property(property="id", type="integer", example=1),
     *                                  @OA\Property(property="employee_id", type="string", example="1"),
     *                                  @OA\Property(property="date", type="string", example="09:00:00"),
     *                                  @OA\Property(property="time_started", type="string", example="09:00:00"),
     *                                  @OA\Property(property="time_ended", type="string", example="2022-11-19T02:46:39.000000Z"),
     *                                  @OA\Property(property="created_at", type="string", example="2022-11-19T02:46:44.000000Z"),
     *                                  @OA\Property(property="updated_at", type="string", example="2022-11-19T02:46:44.000000Z"),
     *                                  @OA\Property(property="overtime_duration", type="integer", example=2),
     *                              ),
     *                          )
     *                 ),
     *             )
     *         )
     *     ),
     *      @OA\Response(
     *          response=400,
     *          description="invalid",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="The given data was invalid."),
     *              @OA\Property(type="array",
     *                 property="errors",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(
     *                         property="date",
     *                         type="string",
     *                         example="The date does not match the format Y-m."
     *                     )
     *                 )
     *             )
     *         )
     *      )
     * )
     */


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}