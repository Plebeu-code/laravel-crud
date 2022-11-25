<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserAddressRequest;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Address;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(User::all(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserAddressRequest  $request
     * @param User $id
     * @return \Illuminate\Http\JsonResponse
     */

    public function addAddress(StoreUserAddressRequest $request, User $id)
    {
        $validator = Validator::make($request->all(), $request->rules());
        $Validated = $validator->safe();

        $createAddress = Address::create($Validated->all());
        $id->address()->attach($createAddress->id);
        return response()->json($createAddress, 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreUserRequest $request)
    {
        //
        try {
            $validator = Validator::make($request->all(), $request->rules());
            if ($validator->fails()) return redirect()->back()->withErrors($validator->errors());
            return DB::transaction(function () use ($validator, $request) {
                $ValidatedUser = $validator->safe()->except("type", "addresses");

                $user = User::create($ValidatedUser);
                foreach ($request->addresses as $address) {
                    $searchAddress = Address::where($address)->first();
                    if ($searchAddress !== null) {
                        $user->address()->attach($searchAddress->id);
                    } else {
                        $newAddress = Address::create($address);
                        $user->address()->save($newAddress);
                    }
                }
                $user->profiles()->attach($request->type);
                return response()->json($user, 201);
            });
        } catch (\Throwable $th) {
            if ($th->getCode() == 23505) {
                return  response()->json('E-mail ou CPF já existe', 409);
            }
            return  response()->json('Erro interno', 500);
        }
    }

    /**
     * Display the specified resource.
     *23505
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user)
    {
        return response()->json(['user' => $user, 'addresses' => $user->address()->get(), 'profile' => $user->profiles()->get()], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param int $id
     */
    public function update(Request $request, $id)
    {
        try {
            $updateUser = User::findOrFail($id);
            foreach ($request->addresses as $address) {
                $editAddress = Address::find($address['id']);
                $editAddress->cep = $address['cep'];
                $editAddress->logradouro = $address['logradouro'];
                $editAddress->save();
            }
            $updateUser->update($request->all());
            $updateUser->profiles()->sync($request->profile);
            return response()->json($updateUser, 200);
        } catch (\Throwable $th) {
            if ($th->getCode() == 23505) {
                return response()->json('Dados duplicados ou incorretos!', 409);
            } else {
                return $th;
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function destroy(int $id)
    {
        $user = User::destroy($id);
        if ($user) {
            return response()->json('Deletado com sucesso!', 200);
        } else {
            return response()->json('Não encontrado!', 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     *
     */

    public function destroyAddress(int $id)
    {
        $address = Address::destroy($id);
        if ($address) {
            return response()->json('Deletado com sucesso!', 200);
        } else {
            return response()->json('Não encontrado!', 404);
        }
    }
}
