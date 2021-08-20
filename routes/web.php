<?php

use Illuminate\Routing\RouteAction;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login/portal', 'Auth\LoginController@showPortalLoginForm')->name('login.portal');
Route::post('/login/portal', 'Auth\LoginController@portalLogin');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth:portal'], function () {

    Route::resource('portal', 'PortalController');
    Route::post('portal/update', 'PortalController@update')->name('portal.update');

});

Route::get('/home/test', 'HomeController@test');


//travel documetns

Route::get('traveldocumentreports/cv_standard/{id}', 'TravelDocumentReportController@cv_standard' )->name('cv_standard');
Route::get('traveldocumentreports/seafarer_employment_contract/{id}', 'TravelDocumentReportController@seafarer_employment_contract' )->name('seafarer_employment_contract');
Route::get('traveldocumentreports/dutch_contract/{id}', 'TravelDocumentReportController@dutch_contract' )->name('dutch_contract');
Route::post('traveldocumentreports/letter_of_guarantee/', 'TravelDocumentReportController@letter_of_guarantee' )->name('letter_of_guarantee');
Route::post('traveldocumentreports/info_to_the_master/', 'TravelDocumentReportController@info_to_the_master' )->name('info_to_the_master');
Route::post('traveldocumentreports/jsu_contract/', 'TravelDocumentReportController@jsu_contract' )->name('jsu_contract');
Route::post('traveldocumentreports/contract_of_employment/', 'TravelDocumentReportController@contract_of_employment' )->name('contract_of_employment');
Route::get('traveldocumentreports/poea_info_sheet/{id}', 'TravelDocumentReportController@poea_info_sheet' )->name('poea_info_sheet');
Route::get('traveldocumentreports/poea_seafarer_info_sheet/{id}', 'TravelDocumentReportController@poea_seafarer_info_sheet' )->name('poea_seafarer_info_sheet');

Route::post('traveldocumentreports/test/', 'TravelDocumentReportController@test')->name('traveldocumentreports.test');
// no middleware

Route::get('getVaccine', 'VaccineController@getVaccine' )->name('getVaccine');
Route::get('getTrainingCourse', 'TrainingCourseController@getTrainingCourse' )->name('getTrainingCourse');
Route::get('getTrainingCenter', 'TrainingCenterController@getTrainingCenter' )->name('getTrainingCenter');
Route::get('getMedicalCertificate', 'MedicalCertificateController@getMedicalCertificate' )->name('getMedicalCertificate');
Route::get('getLicense', 'LicenseController@getLicense' )->name('getLicense');
Route::get('getFlagStateDocument', 'FlagStateDocumentController@getFlagStateDocument' )->name('getFlagStateDocument');
Route::get('getDocument', 'DocumentController@getDocument' )->name('getDocument');
Route::get('getClinic', 'ClinicController@getClinic' )->name('getClinic');
Route::get('getBranch', 'BranchController@getBranch' )->name('getBranch');
Route::get('allTravelDocumentReports', 'TravelDocumentReportController@traveldocumentreports' )->name('allTravelDocumentReports');
Route::get('crewallottees/allottee/{id}', 'CrewAllotteeController@allottee')->name('allottees');
Route::get('crewallottees/getAllottee/{id}', 'CrewAllotteeController@getAllottee')->name('crewAllottees');
Route::get('getBank', 'BankController@getBank' )->name('getBank');

Route::resource('creweducations', 'CrewEducationController');
    Route::post('creweducations/update', 'CrewEducationController@update')->name('creweducations.update');
    Route::get('creweducations/education/{id}', 'CrewEducationController@education')->name('educations');

    Route::resource('crewlicenses', 'CrewLicenseController');
    Route::post('crewlicenses/update', 'CrewLicenseController@update')->name('crewlicenses.update');
    Route::get('crewlicenses/license/{id}', 'CrewLicenseController@license')->name('licenses');
    Route::post('crewlicenses/update_attachment', 'CrewLicenseController@update_attachment')->name('crewlicenses.update_attachment');

    Route::resource('crewflagstatedocuments', 'CrewFlagStateDocumentController');
    Route::post('crewflagstatedocuments/update', 'CrewFlagStateDocumentController@update')->name('crewflagstatedocuments.update');
    Route::get('crewflagstatedocuments/flagstatedocument/{id}', 'CrewFlagStateDocumentController@flagstatedocument')->name('flagstatedocuments');
    Route::post('crewflagstatedocuments/update_attachment', 'CrewFlagStateDocumentController@update_attachment')->name('crewflagstatedocuments.update_attachment');


    Route::resource('crewdocuments', 'CrewDocumentController');
    Route::post('crewdocuments/update', 'CrewDocumentController@update')->name('crewdocuments.update');
    Route::get('crewdocuments/document/{id}', 'CrewDocumentController@document')->name('documents');
    Route::get('crewdocuments/getVisa/{id}', 'CrewDocumentController@getVisa')->name('visa');
    Route::post('crewdocuments/update_attachment', 'CrewDocumentController@update_attachment')->name('crewdocuments.update_attachment');

    Route::resource('crewtrainings', 'CrewTrainingController');
    Route::post('crewtrainings/update', 'CrewTrainingController@update')->name('crewtrainings.update');
    Route::get('crewtrainings/training/{id}', 'CrewTrainingController@training')->name('trainings');
    Route::post('crewtrainings/update_attachment', 'CrewTrainingController@update_attachment')->name('crewtrainings.update_attachment');


    Route::resource('crewdocumentlibraries', 'CrewDocumentLibraryController');
    Route::post('crewdocumentlibraries/update', 'CrewDocumentLibraryController@update')->name('crewdocumentlibraries.update');
    Route::get('crewdocumentlibraries/documentlibrary/{id}', 'CrewDocumentLibraryController@documentlibrary')->name('documentlibraries');
    Route::post('crewdocumentlibraries/update_attachment', 'CrewDocumentLibraryController@update_attachment')->name('crewdocumentlibraries.update_attachment');

    Route::resource('crewmedicals', 'CrewMedicalController');
    Route::post('crewmedicals/update', 'CrewMedicalController@update')->name('crewmedicals.update');
    Route::get('crewmedicals/medical/{id}', 'CrewMedicalController@medical')->name('medicals');
    Route::get('crewmedicals/getMedical/{id}', 'CrewMedicalController@getMedical')->name('getMedical');
    Route::post('crewmedicals/update_attachment', 'CrewMedicalController@update_attachment')->name('crewmedicals.update_attachment');

    Route::resource('crewvaccines', 'CrewVaccineController');
    Route::post('crewvaccines/update', 'CrewVaccineController@update')->name('crewvaccines.update');
    Route::get('crewvaccines/vaccine/{id}', 'CrewVaccineController@vaccine')->name('vaccines');
    Route::post('crewvaccines/update_attachment', 'CrewVaccineController@update_attachment')->name('crewvaccines.update_attachment');


    Route::resource('crewallottees', 'CrewAllotteeController');
    Route::post('crewallottees/update', 'CrewAllotteeController@update')->name('crewallottees.update');

    Route::resource('crewofficehistories', 'CrewOfficeHistoryController');
    Route::post('crewofficehistories/update', 'CrewOfficeHistoryController@update')->name('crewofficehistories.update');
    Route::get('crewofficehistories/officehistory/{id}', 'CrewOfficeHistoryController@officehistory')->name('officehistories');

    Route::resource('crewschildrenbenificiary', 'CrewChildrenBenificiaryController');
    Route::get('crewschildrenbenificiary/beneficiary/{id}', 'CrewChildrenBenificiaryController@beneficiary')->name('beneficiary');
    Route::get('crewschildrenbenificiary/children/{id}', 'CrewChildrenBenificiaryController@children')->name('children');
    Route::get('crewschildrenbenificiary/getBeneficiary/{id}', 'CrewChildrenBenificiaryController@getBeneficiary')->name('beneficiaries');
    Route::post('crewschildrenbenificiary/update', 'CrewChildrenBenificiaryController@update')->name('crewschildrenbenificiary.update');



    Route::resource('crewincidents', 'CrewIncidentController');
    Route::post('crewincidents/update', 'CrewIncidentController@update')->name('crewincidents.update');
    Route::get('crewincidents/crewincident/{id}', 'CrewIncidentController@crewincident')->name('crewincident');
    //Route::post('crewflagstatedocuments/update_attachment', 'CrewFlagStateDocumentController@update_attachment')->name('crewflagstatedocuments.update_attachment');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('traveldocumentreports', 'TravelDocumentReportController');
    // Route::get('/storage/{extra}', function ($extra) {
    //     return redirect("/public/storage/$extra");
    //     })->where('extra', '.*');
    Route::resource('agents', 'AgentController');
    Route::get('allAgents', 'AgentController@allAgents' )->name('allAgents');
    Route::post('agents/update', 'AgentController@update')->name('agents.update');
    Route::get('getAgent', 'AgentController@getAgent' )->name('getAgent');

    Route::resource('signatories', 'SignatoryController');
    Route::get('allSignatory', 'SignatoryController@allSignatory' )->name('allSignatory');
    Route::post('signatories/update', 'SignatoryController@update')->name('signatories.update');
    Route::get('getSignatories', 'SignatoryController@getSignatories' )->name('getSignatories');


    Route::resource('airlines', 'AirlineController');
    Route::get('allAirlines', 'AirlineController@allAirlines')->name('allAirlines');
    Route::post('airlines/update', 'AirlineController@update')->name('airlines.update');

    Route::resource('airports', 'AirportController');
    Route::get('allAirports', 'AirportController@allAirports' )->name('allAirports');
    Route::post('airports/update', 'AirportController@update')->name('airports.update');

    Route::resource('banks', 'BankController');
    Route::get('allBanks', 'BankController@allBanks' )->name('allBanks');

    Route::post('banks/update', 'BankController@update')->name('banks.update');

    Route::resource('branches', 'BranchController');
    Route::get('allBranches', 'BranchController@allBranches' )->name('allBranches');
    Route::post('branches/update', 'BranchController@update')->name('branches.update');


    Route::resource('clinics', 'ClinicController');
    Route::get('allClinics', 'ClinicController@allClinics' )->name('allClinics');
    Route::post('clinics/update', 'ClinicController@update')->name('clinics.update');

    Route::resource('departments', 'DepartmentController');
    Route::get('allDepartments', 'DepartmentController@allDepartments' )->name('allDepartments');
    Route::post('departments/update', 'DepartmentController@update')->name('departments.update');

    Route::resource('flags', 'FlagStateDocumentController');
    Route::get('allFlags', 'FlagStateDocumentController@allFlags' )->name('allFlags');
    Route::post('flags/update', 'FlagStateDocumentController@update')->name('flags.update');

    Route::resource('licenses', 'LicenseController');
    Route::get('allLicenses', 'LicenseController@allLicenses' )->name('allLicenses');
    Route::post('license/update', 'LicenseController@update')->name('licenses.update');

    Route::resource('manningagencies', 'AgencyController');
    Route::get('allManningAgencies', 'AgencyController@allManningAgencies' )->name('allManningAgencies');
    Route::post('manningagencies/update', 'AgencyController@update')->name('manningagencies.update');

    Route::resource('medicalcertificates', 'MedicalCertificateController');
    Route::get('allMedicalCertificates', 'MedicalCertificateController@allMedicalCertificates' )->name('allMedicalCertificates');
    Route::post('medicalcertificates/update', 'MedicalCertificateController@update')->name('medicalcertificates.update');

    Route::resource('ranks', 'RankController');
    Route::get('allRanks', 'RankController@allRanks' )->name('allRanks');
    Route::get('getRank', 'RankController@getRank' )->name('getRank');
    Route::post('ranks/update', 'RankController@update')->name('ranks.update');

    Route::resource('traderoutes', 'TradeRouteController');
    Route::get('allTradeRoutes', 'TradeRouteController@allTradeRoutes' )->name('allTradeRoutes');
    Route::post('traderoutes/update', 'TradeRouteController@update')->name('traderoutes.update');

    Route::resource('training_centers', 'TrainingCenterController');
    Route::get('allTrainingCenters', 'TrainingCenterController@allTrainingCenters' )->name('allTrainingCenters');
    Route::post('training_centers/update', 'TrainingCenterController@update')->name('training_centers.update');

    Route::resource('courses', 'TrainingCourseController');
    Route::get('allCourses', 'TrainingCourseController@allCourses' )->name('allCourses');

    Route::post('courses/update', 'TrainingCourseController@update')->name('courses.update');

    Route::resource('vaccines', 'VaccineController');
    Route::get('allVaccines', 'VaccineController@allVaccines' )->name('allVaccines');

    Route::post('vaccines/update', 'VaccineController@update')->name('vaccines.update');

    Route::resource('documents', 'DocumentController');
    Route::get('allDocuments', 'DocumentController@allDocuments' )->name('allDocuments');
    Route::post('documents/update', 'DocumentController@update')->name('documents.update');

    Route::resource('seaports', 'SeaportController');
    Route::get('allSeaports', 'SeaportController@allSeaports' )->name('allSeaports');
    Route::post('seaports/update', 'SeaportController@update')->name('seaports.update');

    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::get('allUsers', 'UserController@allUser' )->name('allUsers');
    // Route::get('users.index','UserController@index');

    Route::resource('applicants', 'CrewController');

    Route::resource('crews', 'CrewController');
    Route::post('allCrews', 'CrewController@allCrews' )->name('allCrews');
    Route::post('crews/update', 'CrewController@update')->name('crews.update');
    Route::get('crews/getCrewByVessel/{id}', 'CrewController@getCrewByVessel')->name('getCrewByVessel');






    Route::resource('principals', 'PrincipalController');
    Route::get('allPrincipals', 'PrincipalController@allPrincipals' )->name('allPrincipals');
    Route::post('principals/update', 'PrincipalController@update')->name('principals.update');

    Route::resource('salaryscales', 'SalaryScaleController');
    Route::post('salaryscales/update', 'SalaryScaleController@update')->name('salaryscales.update');
    Route::get('salaryscales/salaryscale/{id}', 'SalaryScaleController@salaryscale')->name('salaryscales');

    Route::resource('salaryscaledetails', 'SalaryScaleDetailController');
    Route::post('salaryscaledetails/update', 'SalaryScaleDetailController@update')->name('salaryscaledetails.update');
    Route::get('salaryscaledetails/salaryscaledetail/{id}', 'SalaryScaleDetailController@salaryscaledetail')->name('salaryscaledetails');


    Route::resource('vesselsalaryscales', 'VesselSalaryScaleController');
    Route::post('vesselsalaryscales/update', 'VesselSalaryScaleController@update')->name('vesselsalaryscales.update');


    Route::resource('crewsalaryscales', 'CrewSalaryScaleController');
    Route::get('crewsalaryscales/crewsalaryscale/{id}', 'CrewSalaryScaleController@crewsalaryscale')->name('crewsalaryscale');
    Route::post('crewsalaryscales/update', 'CrewSalaryScaleController@update')->name('crewsalaryscales.update');

    Route::resource('vessels', 'VesselController');
    Route::post('vessels/update', 'VesselController@update')->name('vessels.update');
    Route::get('vessels/vessel/{id}', 'VesselController@vessel')->name('vessels');
    Route::get('vessels/vesselsalaryscale/{id}', 'VesselController@vesselsalaryscale')->name('vesselsalaryscale');
    Route::get('allVessels', 'VesselController@allVessel')->name('allVessels');
    Route::get('getVessel', 'VesselController@getVessel' )->name('getVessel');

    Route::resource('principalcontacts', 'PrincipalContactController');
    Route::post('principalcontacts/update', 'PrincipalContactController@update')->name('principalcontacts.update');
    Route::get('principalcontacts/principalcontact/{id}', 'PrincipalContactController@principalcontact')->name('principalcontacts');

    Route::resource('applicants', 'ApplicantController');
    Route::get('allApplicants', 'ApplicantController@allApplicant' )->name('allApplicants');
    Route::post('crews/update', 'CrewController@update')->name('crews.update');

    Route::resource('vesseltypes', 'VesselTypeController');
    Route::post('vesseltypes/update', 'VesselTypeController@update')->name('vesseltypes.update');
    Route::get('allVesselTypes', 'VesselTypeController@allVesselTypes' )->name('allVesselTypes');


    Route::resource('crewsstatus', 'CrewStatusController');
    Route::resource('crewvessels', 'CrewVesselController');
    Route::resource('embarkations', 'EmbarkationController');
    Route::post('embarkations/update', 'EmbarkationController@update')->name('embarkations.update');
    Route::get('allEmbarkations', 'EmbarkationController@allEmbarkation' )->name('allEmbarkations');
    Route::get('embarkations/crew/{id}', 'EmbarkationController@crew' )->name('embarkations.crew');
    Route::resource('embarkationdetails', 'EmbarkationDetailController');

    Route::resource('disembarkations', 'DisembarkationController');
    Route::get('disembarkations', 'EmbarkationController@disembarkation')->name('disembarkations');
    Route::get('allDisembarkations', 'DisembarkationController@allDisembarkation')->name('allDisembarkations');


    Route::resource('announcements', 'AnnouncementController');
    Route::get('allAnnouncement', 'AnnouncementController@allAnnouncement' )->name('allAnnouncement');
    Route::post('announcements/update', 'AnnouncementController@update')->name('announcements.update');

});
