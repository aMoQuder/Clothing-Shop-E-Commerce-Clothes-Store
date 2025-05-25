<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Model\Contact;
use App\Http\Resources\ContactResource;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller
{
    // GET /api/contacts
    public function index(): JsonResponse
    {
        $contacts = Contact::latest()->paginate(15);

        return response()->json([
            'success' => true,
            'message' => 'Contact list retrieved successfully.',
            'data'    => ContactResource::collection($contacts),
        ]);
    }


    // POST /api/contacts
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string|max:100',
            'email'   => 'required|email|max:255',
            'message' => 'required|string|min:5',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error.',
                'errors'  => $validator->errors(),
            ], 422);
        }

        $contact = Contact::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'message' => $request->message,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Message received successfully.',
            'data'    => new ContactResource($contact),
        ], 201);
    }

    // DELETE /api/contacts/{id}
    public function deletet($id): JsonResponse
    {
        $contact = Contact::find($id);

        if (!$contact) {
            return response()->json([
                'success' => false,
                'message' => 'Contact not found.',
            ], 404);
        }

        $contact->delete();

        return response()->json([
            'success' => true,
            'message' => 'Contact deleted successfully.',
        ]);
    }
}
