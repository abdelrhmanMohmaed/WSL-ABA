<?php

use  Illuminate\Support\Facades\Route;

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

use Dompdf\Dompdf;
use Illuminate\Http\Response;
use Modules\Kids\Entities\Kid;

Route::get('/download-pdf/', function () {
    $kid = Kid::find(4);
    if (!$kid) {
        // إذا لم يتم العثور على الطفل، يمكنك التعامل مع ذلك هنا
        abort(404);
    }

    $dompdf = new Dompdf();
    $html = view('kids::front.test2', compact('kid'))->render();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    $output = $dompdf->output();
    $filename = 'document.pdf';

    return new Response($output, 200, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'attachment; filename="' . $filename . '"',
    ]);
})->name('download-pdf');

//Route::view('test', 'kids::front.test');
Route::get('test/{kid}', [\Modules\Kids\Http\Controllers\ReportController::class, 'test']);

Route::middleware(['customer', 'customerVerification'])->group(function () {
    Route::resources([
        'kids' => \Modules\Kids\Http\Controllers\KidsController::class,
    ]);

    Route::prefix('kids')->name('kids.')
        ->group(function () {

            Route::get('kids-details/{kid}', [\Modules\Kids\Http\Controllers\KidsController::class, 'details'])->name('details');
            Route::get('kids-details/print/{kid}', [\Modules\Kids\Http\Controllers\KidsController::class, 'print'])->name('print');
            Route::post('get-cities', [\Modules\Kids\Http\Controllers\KidsController::class, 'getCities'])->name('cities');

            # Start Evaluate Plans Routes kids.evaluate.
            Route::get('evaluate/{kid}', [\Modules\Kids\Http\Controllers\EvaluationController::class, 'evaluation'])->name('evaluation');

            Route::prefix('evaluate')->name('evaluate.')
                ->group(function () {
                    # Start Appeals Routes kids.evaluate.appeals.
                    Route::prefix('appeals')->name('appeals.')
                        ->controller(\Modules\Kids\Http\Controllers\EvaluationController::class)
                        ->group(function () {

                            Route::get('{kid}', 'appeals')->name('create');
                            Route::post('store/{kid}', 'storeAppeals')->name('store');
                            Route::post('destroy', 'destroy')->name('destroy');
                            Route::get('{kid}/vertical-draw/{sessionId?}', 'showVerticalDraw')->name('vertical-draw');
                            Route::get('{kid}/report/{userSession}', 'report')->name('report');

                        });
                    # End Appeals Routes


                    # Start Favorites Routes kids.evaluate.favorites.
                    Route::prefix('favorites')->name('favorites.')
                        ->controller(\Modules\Kids\Http\Controllers\FavoriteController::class)
                        ->group(function () {

                            Route::get('{kid}/index/{favorite?}', 'index')->name('index');
                            Route::get('{kid}/show', 'show')->name('show');

                            Route::get('{kid}/create', 'create')->name('create');
                            Route::post('{kid}/store', 'store')->name('store');
                            Route::post('update', 'update')->name('update');
                            Route::DELETE('destroy/{favorite}', 'destroy')->name('destroy');
                        });
                    # End Favorites Routes
                });
            # End Evaluate Plans Routes

            # Start Treatment Plans Routes kids.treatment-plans.
            Route::prefix('treatment-plans')->name('treatment-plans.')
                ->controller(\Modules\Kids\Http\Controllers\TreatmentPlansController::class)
                ->group(function () {

                    Route::get('{kid}', 'index')->name('index');
                    Route::get('{kid}/show/{session?}', 'show')->name('show');


                    # Start Goals Routes kids.treatment-plans.goals.
                    Route::prefix('goals')->name('goals.')
                        ->controller(\Modules\Kids\Http\Controllers\GoalController::class)
                        ->group(function () {

                            Route::get('/{kid}', 'index')->name('index');
                            Route::post('store/{kid}', 'store')->name('store');
                            Route::post('update', 'update')->name('update');
                            Route::post('destroy', 'destroy')->name('destroy');


                            # Start Sessions Routes kids.treatment-plans.goals.sessions.
                            Route::prefix('sessions')->name('sessions.')
                                ->controller(\Modules\Kids\Http\Controllers\SessionController::class)
                                ->group(function () {

                                    Route::get('/{kid}/{goal}', 'index')->name('index');
                                    Route::get('/{kid}/create/{goal}', 'create')->name('create');
                                    Route::post('/{kid}/store/{goal}', 'store')->name('store');
                                });
                            # End Sessions Routes

                            # Start Sessions Routes kids.treatment-plans.goals.charts.API/1/1
                            Route::prefix('charts')->name('charts.')
                                ->controller(\Modules\Kids\Http\Controllers\ChartController::class)
                                ->group(function () {

                                    Route::get('/{kid}/{goal}/', 'index')->name('index');
                                    Route::get('/API/{kid}/{goal}', 'getChart')->name('getChart');
                                });
                            # End Sessions Routes

                            # Start AccomplishedGoals Routes kids.treatment-plans.goals.AccomplishedGoals.
                            Route::prefix('AccomplishedGoals')->name('accomplishedGoals.')
                                ->controller(\Modules\Kids\Http\Controllers\AccomplishedGoalsController::class)
                                ->group(function () {

                                    Route::get('/{kid}', 'index')->name('index');
                                    Route::post('update', 'update')->name('update');
                                });
                            # End AccomplishedGoals Routes
                        });
                    # End Goals Routes
                });
            # End Treatment Plans Routes


            # Start Reports Routes kids.reports.
            Route::prefix('reports')->name('reports.')
                ->controller(\Modules\Kids\Http\Controllers\ReportController::class)
                ->group(function () {

                    Route::get('{kid}', 'index')->name('index');
                    Route::get('API/{kid}', 'getData')->name('getData');
                });
            # End Reports Routes
        });
});


















