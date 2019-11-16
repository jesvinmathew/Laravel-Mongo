<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// OTP
Route::post('sendOTP', 'UserController@sendOTP');
Route::post('sendEmailOTP', 'UserController@sendEmailOTP');
Route::post('validateOTP', 'UserController@validateOTP');
Route::post('agentRegister', 'UserController@agentRegister');
Route::post('login', 'UserController@login');
Route::post('Register', 'UserController@register');
Route::group(['middleware' => 'auth:api'], function(){
    //User
	Route::post('logout', 'UserController@logout');
	Route::post('user', 'UserController@getAuthenticatedUser');
	Route::post('getUserProfile', 'UserController@getUserProfile');
	// Amenity
	Route::post('getAmenities', 'AmenityController@getAmenities');
	Route::post('addAmenity', 'AmenityController@addAmenity');
	Route::post('amenityEdit', 'AmenityController@amenityEdit');
	Route::post('updateAmenity', 'AmenityController@updateAmenity');
	Route::post('setAmenityStatus', 'AmenityController@setProductStatus');
	//Facility
	Route::post('allFacility', 'FacilityController@allFacility');
	Route::post('getFacilities', 'FacilityController@getFacilities');
	Route::post('addFacility', 'FacilityController@addFacility');
	Route::post('facilityEdit', 'FacilityController@facilityEdit');
	Route::post('updateFacility', 'FacilityController@updateFacility');
	Route::post('addHotelFacility', 'FacilityController@addHotelFacility');
	Route::post('setFacilityStatus', 'FacilityController@setProductStatus');
	Route::post('removefacility', 'FacilityController@removefacility');
	//FoodPlan
	Route::post('allfoodplan', 'FoodController@allfoodplan');
	Route::post('getFoodPlans', 'FoodController@getFoodPlans');
	Route::post('getFoodPlansagents', 'FoodController@getFoodPlansagents');
	Route::post('addFoodPlan', 'FoodController@addFoodPlan');
	Route::post('foodPlanEdit', 'FoodController@foodPlanEdit');
	Route::post('updateFoodPlan', 'FoodController@updateFoodPlan');
	Route::post('addHotelFoodPlan', 'FoodController@addHotelFoodPlan');
	Route::post('setFoodplanStatus', 'FoodController@setProductStatus');
	Route::post('removePlan', 'FoodController@removePlan');
	//HotelType
	Route::post('getHotelTypes', 'HotelController@getHotelTypes');
	Route::post('getHotelStatus', 'HotelController@getHotelStatus');
	Route::post('addHotelType', 'HotelController@addHotelType');
	Route::post('hotelTypeEdit', 'HotelController@hotelTypeEdit');
	Route::post('updateHotelType', 'HotelController@updateHotelType');
	Route::post('setHoteltypeStatus', 'HotelController@setHoteltypeStatus');
	//LandScape
	Route::post('getLandScape', 'LandScapeController@getLandScape');
	Route::post('LandScape', 'LandScapeController@getLandScape');
	Route::post('addLandScape', 'LandScapeController@addLandScape');
	Route::post('landScapeEdit', 'LandScapeController@landScapeEdit');
	Route::post('updateLandScape', 'LandScapeController@updateLandScape');
	Route::post('setLandscapeStatus', 'LandScapeController@setProductStatus');
	//Country
	Route::post('getLocations', 'CountryController@getLocations');
	Route::post('getCountries', 'CountryController@getCountries');
	Route::post('addCountryDetails', 'CountryController@addCountryDetails');
	Route::post('countryEdit', 'CountryController@countryEdit');
	Route::post('updateCountry', 'CountryController@updateCountry');
	Route::post('setCountryStatus', 'CountryController@countryStatus');
	Route::post('addLocation', 'CountryController@addLocation');

	//Language
	Route::post('getLanguages', 'LanguageController@getLanguages');
	Route::post('addLanguage', 'LanguageController@addLanguage');
	Route::post('languageEdit', 'LanguageController@languageEdit');
	Route::post('updateLanguage', 'LanguageController@updateLanguage');
	Route::post('setLanguageStatus', 'LanguageController@setProductStatus');
	
	//Package
	Route::post('getPackageType', 'PackageController@getPackageType');
	Route::post('addPackageType', 'PackageController@addPackageType');
	Route::post('editPackageType', 'PackageController@editPackageType');
	Route::post('updatePackageType', 'PackageController@updatePackageType');
	Route::post('setPackagetypeStatus', 'PackageController@setProductStatus');
	
	//ComapnyType
	Route::post('getCompanyTypes', 'CompanyTypeController@getCompanyTypes');
	Route::post('addCompanyType', 'CompanyTypeController@addCompanyType');
	Route::post('companyTypeEdit', 'CompanyTypeController@companyTypeEdit');
	Route::post('updateCompanyType', 'CompanyTypeController@updateCompanyType');
	Route::post('companyTypeStatus', 'CompanyTypeController@companyTypeStatus');
	
	//Room
	Route::post('getRoomTypes', 'RoomController@getRoomTypes');
	Route::post('addRoomType', 'RoomController@addRoomType');
	Route::post('roomTypeEdit', 'RoomController@roomTypeEdit');
	Route::post('updateRoomType', 'RoomController@updateRoomType');
	Route::post('setRoomtypeStatus', 'RoomController@setProductStatus');
	Route::post('addRoom', 'RoomController@addRoom');
	Route::post('getRoomdetails', 'RoomController@getRoomdetails');
	Route::post('roomdetailsEdit', 'RoomController@roomdetailsEdit');
	Route::post('updateRoom', 'RoomController@updateRoom');
	Route::post('getTax', 'RoomController@getTax');

	//CancellationPolicy
	Route::post('getCancellations', 'CancellationPolicyController@getCancellations');
	Route::post('getHotelPolicy', 'ClientDetailController@getHotelPolicy');
	Route::post('addCancellation', 'CancellationPolicyController@addCancellation');
	Route::post('cancellationEdit', 'CancellationPolicyController@cancellationEdit');
	Route::post('updateCancellation', 'CancellationPolicyController@updateCancellation');
	Route::post('setCancellationStatus', 'CancellationPolicyController@setProductStatus');
	
    //state
    Route::post('getstates', 'StateController@getstates');
    Route::post('getDistrict', 'StateController@getDistrict');
    Route::post('getCity', 'StateController@getCity');
    
    //place
	// Route::get('placeDetail', 'PlaceDetailController@details');
	// Route::post('getLocationRoot', 'PlaceDetailController@getPlace');
	// Route::post('getPlace', 'PlaceDetailController@getPlaceList');
	// Route::post('addLocation', 'PlaceDetailController@addLocation');
	
	//Hotels
	Route::post('setHotelStatus', 'HotelController@setHotelStatus');
	Route::post('addHotel', 'HotelController@addHotel');
	Route::post('addRating', 'HotelController@addRating');
	Route::post('getRatings', 'HotelController@getRatings');
	Route::post('ratingEdit', 'HotelController@ratingEdit');
	Route::post('updateRating', 'HotelController@updateRating');
	Route::post('getHotelsTypes', 'HotelController@getHotelTypes');
	Route::post('getDepartments', 'HotelController@getDepartments');
	Route::post('addDepartment', 'HotelController@addDepartment');
	Route::post('departmentEdit', 'HotelController@departmentEdit');
	Route::post('updateDepartment', 'HotelController@updateDepartment');
	Route::post('setDepartmentStatus', 'HotelController@departmentStatus');
	Route::post('getDesignations', 'HotelController@getDesignations');
	Route::post('addDesignation', 'HotelController@addDesignation');
	Route::post('designationEdit', 'HotelController@designationEdit');
	Route::post('updateDesignation', 'HotelController@updateDesignation');
	Route::post('setDesignationStatus', 'HotelController@setDesignationStatus');
	Route::post('getAttractions', 'HotelController@getAttractions');
	Route::post('addAttraction', 'HotelController@addAttraction');
	Route::post('attractionEdit', 'HotelController@attractionEdit');
	Route::post('updateAttraction', 'HotelController@updateAttraction');
	Route::post('attractionDelete', 'HotelController@attractionDelete');
	Route::post('setAttractionStatus', 'HotelController@setAttractionStatus');
	
	//HotelEdit
	Route::post('MyHotels', 'ClientDetailController@getMyHotels');
	Route::post('addBasicDetails', 'ClientDetailController@addBasicDetails');
	Route::post('addContactDetails', 'ClientDetailController@addContactDetails');
	Route::post('addAccountDetails', 'ClientDetailController@addAccountDetails');
	Route::post('policyAdd', 'ClientDetailController@policyAdd');
	
	//DepartmentUpdate
	Route::post('addContact', 'ClientDetailController@addContact');
	Route::post('getContacts', 'ClientDetailController@getContacts');
	Route::post('contactEdit', 'ClientDetailController@contactEdit');
	Route::post('updateContact', 'ClientDetailController@updateContact');
	
	//UpdateNearByPlace
	Route::post('getNearPlace', 'ClientDetailController@getNearPlace');
	Route::post('addNearPlace', 'ClientDetailController@addNearPlace');
	Route::post('nearPlaceDelete', 'ClientDetailController@nearPlaceDelete');
	Route::post('setPlaceStatus', 'ClientDetailController@setPlaceStatus');
	
	//Document
    Route::post('getDocuments', 'ClientDetailController@getDocuments');
	Route::post('addDocument', 'ClientDetailController@addDocument');
	Route::post('documentEdit', 'ClientDetailController@documentEdit');
	Route::post('updateDocument', 'ClientDetailController@updateDocument');
	Route::post('documentStatus', 'ClientDetailController@documentStatus');
	
	//Document Type
	Route::post('addDocs', 'ClientDetailController@addDocs');
    Route::post('removeDoc', 'ClientDetailController@removeDoc');
    Route::post('viewDocs', 'ClientDetailController@viewDocs');
    
    //hotelImage
    Route::post('addHotelImages', 'ClientDetailController@addHotelImages');
    Route::post('removeHotelImage', 'ClientDetailController@removeHotelImage');
    Route::post('getHotelImages', 'ClientDetailController@getHotelImages');
    Route::post('fileSettings', 'ClientDetailController@getImageSettings');
    
	//Tax
	Route::post('getTaxCategory', 'CountryController@getTaxCategory');
	Route::post('addTaxCategory', 'CountryController@addTaxCategory');
	Route::post('taxCategoryEdit', 'CountryController@taxCategoryEdit');
    Route::post('getTaxDetails', 'CountryController@getTaxDetails');
	Route::post('updateTaxCategory', 'CountryController@updateTaxCategory');
	Route::post('setTaxStatus', 'CountryController@setTaxStatus');
     
    Route::post('getBasicDetails', 'ClientDetailController@getBasicDetails');
	Route::post('getContactDetails', 'ClientDetailController@getContactDetails');
	Route::post('getaccountDetails', 'ClientDetailController@getAccount');

	//Inventory
	Route::post('getInventoryDetails', 'ClientDetailController@getInventoryDetails');
	Route::post('getHotelRoomType', 'ClientDetailController@getHotelRoomType');
	Route::post('getHotelDetails', 'ClientDetailController@getHotelDetails');
	Route::post('getBackwardDate', 'ClientDetailController@getBackwardDate');
	Route::post('updateInventory', 'ClientDetailController@updateInventory');
	Route::post('massAssignWithRange', 'ClientDetailController@massAssignWithRange');
	Route::post('massAssignInv', 'ClientDetailController@massAssignInv');

	//Agent
    Route::post('agentList', 'AgentController@agentList');
    Route::post('setAgentStatus', 'AgentController@setAgentStatus');
    Route::post('getagentProfile', 'AgentController@agentdetails');
    Route::post('agentUpdate', 'AgentController@updateAgent');
    Route::post('getMenu', 'UserController@getMenu');
    Route::post('agentProfile', 'AgentController@agentProfile');
    Route::post('agentLogout', 'UserController@agentLogout');

    // Package
    Route::post('addPackage', 'AgentController@addPackage');
    Route::post('addInclusions', 'AgentController@addInclusions');
    Route::post('addPackageActivities', 'AgentController@addPackageActivities');
    Route::post('addAccomodations', 'AgentController@addAccomodations');
    Route::post('addPrice', 'AgentController@addPrice');
    Route::post('addConditions', 'AgentController@addPackageConditions');
    Route::post('addItinenaries', 'AgentController@addItinenaries');
    Route::post('viewDestinationImage', 'AgentController@viewDestinationImage');
    Route::post('getPackages', 'AgentController@getPackage');
    Route::post('setPackageStatus', 'AgentController@setPackageStatus');
    Route::post('getPackagedetails', 'AgentController@getPackagedetails');
    Route::post('updatePackage', 'AgentController@updatePackagedetails');
    Route::post('getTerms', 'AgentController@getTerms');
    Route::post('getPolicies', 'AgentController@getPolicies');
    Route::post('editPackageDestination','AgentController@editPackageDestination');
    
    // // Package Type
    // Route::post('addPackageType', 'AgentController@addPackageType');
    // Route::post('getPackageType', 'AgentController@getPackageType');
    // Route::post('editPackageType', 'AgentController@editPackageType');
    // Route::post('updatePackageType', 'AgentController@updatePackageType');
    
    //Activities
    Route::post('addActivities', 'AgentController@addActivities');
    Route::post('getActivities', 'AgentController@getActivities');
    Route::post('removeActivity', 'AgentController@removeActivity');
    Route::post('activityEdit', 'AgentController@activityEdit');
    Route::post('updateActivity', 'AgentController@updateActivity');
    
    //Agent Contacts
    Route::post('agentcontactUpdate', 'AgentController@updateAgentContact');
    Route::post('editContacts', 'AgentController@editContacts');
    Route::post('addagentContact', 'AgentController@addAgentContact');
    
    //Package Image    
    Route::post('getPackImages', 'AgentController@getPackImages');
    Route::post('removePackageImage', 'AgentController@removePackageImage');
    Route::post('addPackageImage', 'AgentController@addPackageImage');
    
    //Agent Policy
    Route::post('addAgentPolicy', 'AgentController@addAgentPolicy');
    Route::post('editAgentPolicy', 'AgentController@editAgentPolicy');
    Route::post('updateAgentPolicy', 'AgentController@updateAgentPolicy');
    
    //AgentDocs
    Route::post('addAgentDocs', 'AgentController@addDoc');
    Route::post('getAgentDocs', 'AgentController@getDocs');
    Route::post('removeAgentDocs', 'AgentController@removeDocs');
    
    //AgentDestination
    Route::post('addPackageDestination', 'AgentController@addPackageDestination');
    Route::post('removeDestinationImage', 'AgentController@removeDestinationImage');
	
	//Agreement
	Route::post('agreement', 'ClientDetailController@agreement');
	Route::post('updateAgreement', 'ClientDetailController@updateAgreement');
});