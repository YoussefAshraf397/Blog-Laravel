<?php

namespace App\Http\Controllers\Admin;

use App\Enums\PlaceStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Place;
use App\Models\PlaceType;
use App\Models\PropertyType;
use App\User;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index()
    {
        $places = Place::latest()->get();
        return view('admin.place.index',compact('places'));
    }

    public function create()
    {
        $placeStatus = PlaceStatusEnum::getValues();
        $placeTypes = PlaceType::where('status','active')->get();
        $propertyTypes = PropertyType::where('status','active')->get();
        $cities = City::all();
        $users = User::all();
        return view(
            'admin.place.create',
            compact(
                'placeStatus',
                'placeTypes', 'propertyTypes', 'cities',
                'users'
            )
        );
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['requires_professional_photographer'] = $request->has('requires_professional_photographer') ? 1 : 0;
        $input['accepts_reservations_automatically'] = $request->has('accepts_reservations_automatically') ? 1 : 0;
        $input['is_active'] = $request->has('is_active') ? 1 : 0;
        $input['accepts_promocodes'] = $request->has('accepts_promocodes') ? 1 : 0;
        $input['support_overnight'] = $request->has('support_overnight') ? 1 : 0;
        $input['can_use_additional_services'] = $request->has('can_use_additional_services') ? 1 : 0;
        $input['is_accepting_additional_service'] = $request->has('is_accepting_additional_service') ? 1 : 0;

        $this->validate($request,[
            'name_en' => 'required',
            'name_ar' => 'required',
            'description_en' => 'required',
            'description_ar' => 'required',
            'cancellation_policy_en' => 'required',
            'cancellation_policy_ar' => 'required',

            'status' => 'required',
            'place_type_id' => 'required',
            'property_type_id' => 'required',
            'city_id' => 'required',
            'category_group' => 'required',
            'user_id' => 'required',

            'price_per_day_on_week_days' => 'required|numeric',
            'price_per_day_on_week_end' => 'required|numeric',
            'custom_commission' => 'required|numeric',
        ]);

        $input['name']['ar'] = $input['name_ar'];
        $input['name']['en'] = $input['name_en'];
        $input['description']['ar'] = $input['description_ar'];
        $input['description']['en'] = $input['description_en'];
        $input['cancellation_policy']['ar'] = $input['cancellation_policy_ar'];
        $input['cancellation_policy']['en'] = $input['cancellation_policy_en'];


        $place = new Place();
        $place->name = json_encode($input['name']);
        $place->details = json_encode($input['description']);
        $place->cancellation_policy = json_encode($input['cancellation_policy']);

        $place->status = $input['status'];
        $place->category_group = $input['category_group'];
        $place->place_type_id = $input['place_type_id'];
        $place->property_type_id = $input['property_type_id'];
        $place->city_id = $input['city_id'];
        $place->user_id = $input['user_id'];

        $place->requires_professional_photographer = $input['requires_professional_photographer'];
        $place->accepts_reservations_automatically = $input['accepts_reservations_automatically'];
        $place->is_active = $input['is_active'];
        $place->accepts_promocodes = $input['accepts_promocodes'];
        $place->support_overnight = $input['support_overnight'];
        $place->can_use_additional_services = $input['can_use_additional_services'];
        $place->is_accepting_additional_service = $input['is_accepting_additional_service'];
        $place->requires_professional_photographer = $input['requires_professional_photographer'];

        $place->price_per_day_on_week_days = $input['price_per_day_on_week_days'];
        $place->price_per_day_on_week_end = $input['price_per_day_on_week_end'];
        $place->custom_commission = $input['custom_commission'];

        $place->save();
        toastr()->success('Place has been Created successfully!');
        return redirect()->route('admin.place.index');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $place = Place::find($id);
        $placeStatus = PlaceStatusEnum::getValues();
        $placeTypes = PlaceType::where('status','active')->get();
        $propertyTypes = PropertyType::where('status','active')->get();
        $cities = City::all();
        $users = User::all();
        return view('admin.place.edit',compact(
            'place',
            'placeStatus',
            'placeTypes', 'propertyTypes', 'cities',
            'users'
        ));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $input['requires_professional_photographer'] = $request->has('requires_professional_photographer') ? 1 : 0;
        $input['accepts_reservations_automatically'] = $request->has('accepts_reservations_automatically') ? 1 : 0;
        $input['is_active'] = $request->has('is_active') ? 1 : 0;
        $input['accepts_promocodes'] = $request->has('accepts_promocodes') ? 1 : 0;
        $input['support_overnight'] = $request->has('support_overnight') ? 1 : 0;
        $input['can_use_additional_services'] = $request->has('can_use_additional_services') ? 1 : 0;
        $input['is_accepting_additional_service'] = $request->has('is_accepting_additional_service') ? 1 : 0;

        $this->validate($request,[
            'name_en' => 'required',
            'name_ar' => 'required',
            'description_en' => 'required',
            'description_ar' => 'required',
            'cancellation_policy_en' => 'required',
            'cancellation_policy_ar' => 'required',

            'status' => 'required',
            'place_type_id' => 'required',
            'property_type_id' => 'required',
            'city_id' => 'required',
            'category_group' => 'required',
            'user_id' => 'required',

            'price_per_day_on_week_days' => 'required|numeric',
            'price_per_day_on_week_end' => 'required|numeric',
            'custom_commission' => 'required|numeric',
        ]);

        $place = Place::find($id);

        $input['name']['ar'] = $input['name_ar'];
        $input['name']['en'] = $input['name_en'];
        $input['description']['ar'] = $input['description_ar'];
        $input['description']['en'] = $input['description_en'];
        $input['cancellation_policy']['ar'] = $input['cancellation_policy_ar'];
        $input['cancellation_policy']['en'] = $input['cancellation_policy_en'];

        $place->name = json_encode($input['name']);
        $place->details = json_encode($input['description']);
        $place->cancellation_policy = json_encode($input['cancellation_policy']);

        $place->status = $input['status'];
        $place->category_group = $input['category_group'];
        $place->place_type_id = $input['place_type_id'];
        $place->property_type_id = $input['property_type_id'];
        $place->city_id = $input['city_id'];
        $place->user_id = $input['user_id'];

        $place->requires_professional_photographer = $input['requires_professional_photographer'];
        $place->accepts_reservations_automatically = $input['accepts_reservations_automatically'];
        $place->is_active = $input['is_active'];
        $place->accepts_promocodes = $input['accepts_promocodes'];
        $place->support_overnight = $input['support_overnight'];
        $place->can_use_additional_services = $input['can_use_additional_services'];
        $place->is_accepting_additional_service = $input['is_accepting_additional_service'];
        $place->requires_professional_photographer = $input['requires_professional_photographer'];

        $place->price_per_day_on_week_days = $input['price_per_day_on_week_days'];
        $place->price_per_day_on_week_end = $input['price_per_day_on_week_end'];
        $place->custom_commission = $input['custom_commission'];

        $place->save();
        toastr()->success('Place has been updated successfully!');
        return redirect()->route('admin.place.index');
    }

    public function destroy($id)
    {
        $place = Place::find($id);
        $place->delete();
        toastr()->success('Place has been deleted successfully!');
        return redirect()->back();
    }
}
