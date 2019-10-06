<?php

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

Route::get('/', 'MasterController@index')->name('home2');
Route::get('/jurusan/tkj', 'MasterController@tkj');
Route::get('/jurusan/perbankan', 'MasterController@perbankan');
Route::get('/jurusan/multimedia', 'MasterController@multimedia');

Route::get('/jurusan/{id}' , 'MasterController@jurusan')->name('jurusan');

Route::get('/alumni', 'MasterController@alumni')->name('alumni');


Route::get('/gallery', 'MasterController@gallery')->name('gallery_foto');
Route::get('/gallery/{id_album}', 'MasterController@gallery2')->name('gallery_foto2');


Route::get('/berita', 'MasterController@berita')->name('berita_master');
Route::get('/berita/{judul}/id/{id}', 'MasterController@berita_view')->name('berita_view');
Route::post('/seach/berita', 'MasterController@berita_search')->name('berita_search2');

//files master
Route::get('/filesmapel', 'MasterController@files')->name('filesmapel_master');
Route::post('/search', 'MasterController@filesmapel_search')->name('filesmapel_search');

//visimisi
Route::get('/visimisi', 'MasterController@visimisi')->name('visimisi_master');

//profilsekolah
Route::get('/profilsekolah', 'MasterController@profilsekolah')->name('profilsekolah_master');





// ppdb 

Route::get('/ppdb/form', 'ppdbController@indexform')->name('ppdbform');
Route::post('/ppdb/form/add', 'ppdbController@addform')->name('addform');
Route::get('/ppdb/form/show/{id}','ppdbController@showform');
Route::post('/ppdb/form/store/{id}', 'ppdbController@storeform')->name('storeform');

Route::get('/ppdb/hasil/','ppdbController@hasil')->name('hasil');
Route::post('/ppdb/hasil/cek', 'ppdbController@cekhasil')->name('cekhasil');




Auth::routes();


/*admin*/

Route::get('/admin', 'AdminController@coba');
Route::get('/admin/halaman-depan/statistik', 'AdminController@statistik')->name('statistik');
Route::post('/admin/halaman-depan/statistik-up', 'AdminController@up_statistik')->name('up_statistik');

Route::get('/admin/halaman-depan/video', 'AdminController@video')->name('hal_video');
Route::post('/admin/halaman-depan/video-up', 'AdminController@up_video')->name('up_video');

Route::get('/admin/halaman-depan/slidebar', 'AdminController@slidebar')->name('input_slidebar');
Route::get('/admin/halaman-depan/data-slidebar', 'AdminController@slidebar2')->name('data_slidebar');
Route::get('/admin/slider/del/{id}', 'AdminController@slider_del')->name('del_slider');
Route::post('/admin/slider/proses', 'AdminController@slider_up')->name('up_slider');

/*jurusan*/
Route::get('/admin/jurusan', 'AdminController@jurusan')->name('input_jurusan');
Route::get('/admin/jurusan/{id}', 'AdminController@jurusan2')->name('data_jurusan');
Route::get('/admin/jurusan-del/{id}', 'AdminController@del_jurusan')->name('del_jurusan');

Route::get('/admin/jurusan/{id}/data', 'AdminController@jurusan3');
Route::post('/admin/jurusan', 'AdminController@jurusan_up')->name('up_jurusan');
Route::post('/admin/jurusan/{id}/p', 'AdminController@jurusan_up_modal')->name('up_jur_modal');
Route::post('/admin/jurusan/{id}/b', 'AdminController@jurusan_up_keunggulan')->name('up_jur_keunggulan');
Route::get('/admin/jurusan/{id}/baa', 'AdminController@jurusan_hal_keunggulan')->name('edithal_jur_keunggulan');
Route::post('/admin/jurusan/{id}/ba', 'AdminController@jurusan_edit_keunggulan')->name('editpro_jur_keunggulan');
Route::get('/admin/jurusan/{id}/bb', 'AdminController@jurusan_del_keunggulan')->name('del_jur_keunggulan');
Route::post('/admin/jurusan/{id}/c', 'AdminController@jurusan_up_alasan')->name('up_jur_alasan');
Route::get('/admin/jurusan/{id}/ca', 'AdminController@jurusan_hal_alasan')->name('edithal_jur_alasan');
Route::post('/admin/jurusan/{id}/caa', 'AdminController@jurusan_edit_alasan')->name('editpro_jur_alasan');
Route::get('/admin/jurusan/{id}/cb', 'AdminController@jurusan_del_alasan')->name('del_alasan');
Route::post('/admin/jurusan/{id}/d', 'AdminController@jurusan_up_gallery')->name('up_jur_gallery');
Route::get('/admin/jurusan/{id}/dd', 'AdminController@jurusan_del_gallery')->name('del_jur_gallery');



Route::get('/admin/ketenagaan', 'AdminController@ketenagaan')->name('input_gtk');
Route::get('/admin/ketenagaan-data', 'AdminController@data_ketenagaan')->name('data_gtk');
Route::get('/admin/ketenagaan-data/{id}', 'AdminController@data_ketenagaan2')->name('data2_gtk');
Route::get('/admin/ketenagaan/lab', 'AdminController@laborat')->name('input_lab');
Route::post('/admin/ketenagaan/lab-up', 'AdminController@up_laborat')->name('up_laborat');

Route::post('/admin/ketenagaan-up', 'AdminController@up_ketenagaan')->name('up_ketenagaan');
Route::post('/admin/ketenagaan-edit/{id}', 'AdminController@edit_ketenagaan')->name('edit_ketenagaan');
Route::get('/admin/ketenagaan-del/{id}', 'AdminController@del_ketenagaan')->name('del_ketenagaan');


Route::get('/admin/halaman-depan/kata-sambutan', 'AdminController@katasambutan')->name('kata_depan');
Route::post('/admin/kata-depan/proses', 'AdminController@kata_up')->name('up_kata');

Route::get('/admin/halaman-depan/keunggulan', 'AdminController@keunggulan')->name('input_keunggulan');
Route::get('/admin/halaman-depan/data-keunggulan', 'AdminController@keunggulan2')->name('data_keunggulan');
Route::post('/admin/keunggulan/proses', 'AdminController@keunggulan_up')->name('up_keunggulan');

Route::get('/admin/halaman-depan/kepala', 'AdminController@kepala')->name('kepala');
Route::post('/admin/kepala/proses', 'AdminController@kepala_up2')->name('up_kepala');

/*Route::get('/admin/gallery/{id}', 'AdminController@gallery_edit');*/
Route::post('/admin/gallery/{id}/p', 'AdminController@gallery_up2')->name('edit_gambar');
Route::get('/admin/gallery/del2/{id}', 'AdminController@gallery_del2')->name('del_perfoto');
Route::get('/admin/gallery-del/{id}', 'AdminController@gallery_del')->name('del_album');

// gallery
Route::get('/admin/gallery', 'AdminController@gallery');
Route::get('/admin/gallery-foto', 'AdminController@gallery_foto')->name('input_gallery_foto');
Route::get('/admin/gallery-foto-data', 'AdminController@gallery_datafoto')->name('data_gallery_foto');
Route::get('/admin/gallery/{id}', 'AdminController@gallery_edit2')->name('edit_gallery_foto');
Route::post('/admin/gallery/{id}/proses', 'AdminController@gallery_editpros')->name('edit_gambar');
Route::post('/admin/gallery/proses', 'AdminController@gallery_up')->name('up_gallery');

/*alumni*/
Route::get('/admin/alumni', 'AdminController@alumni')->name('input_alumni');
Route::get('/admin/data-alumni', 'AdminController@alumni2')->name('data_alumni');
Route::post('/admin/alumni/proses', 'AdminController@alumni_proses')->name('up_alumni');
Route::get('/admin/alumni/del/{id}', 'AdminController@alumni_del')->name('del_alumni');

Route::get('/ppdb', 'AdminController@ppdb');
Route::get('/admin/berita', 'AdminController@berita_add2')->name('berita_add');
Route::get('/admin/data-berita', 'AdminController@berita_controller2')->name('berita_data');

Route::get('/admin/berita/add', 'AdminController@berita_add')->name('berita_add1');
Route::post('/admin/berita/store', 'AdminController@berita_store')->name('berita_store');
Route::get('/admin/berita/controller', 'AdminController@berita_controller')->name('berita_controller');
Route::post('/admin/berita/del', 'AdminController@berita_del')->name('berita_del');
Route::get('/admin/berita/edit/{id}', 'AdminController@berita_edit')->name('berita_edit');
Route::post('/admin/berita/update', 'AdminController@berita_update')->name('berita_update');
Route::get('/admin/berita/search', 'AdminController@berita_search')->name('berita_search');

//cke
Route::post('upload_image','AdminController@berita_upimage')->name('berita_upimage');


Route::get('/home', 'HomeController@index')->name('home');

//FILES and MAPEL
Route::get('/admin/filesmapel', 'AdminController@files')->name('filesmapel');
Route::post('up_mapel','AdminController@up_mapel')->name('up_mapel');
Route::post('up_files','AdminController@up_files')->name('up_files');
Route::get('/admin/filesmapelcontroll', 'AdminController@filesmapelcontroller')->name('filesmapelcontroller');
Route::get('/admin/filesmapeldel/{id}','AdminController@filesmapeldel')->name('filesmapeldel');
Route::get('/admin/filesmapeledit/{id}', 'AdminController@filesmapeledit')->name('filesmapeledit');
Route::post('/admin/filesmapel_store', 'AdminController@filesmapel_store')->name('filesmapel_store');

//Visi misi
Route::get('/admin/visimisi', 'AdminController@visimisi')->name('visimisi');
Route::post('/admin/visimisi_store', 'Admincontroller@visimisi_store')->name('visimisi_store');

//profilsekolah
Route::get('/admin/profilsekolah', 'AdminController@profilsekolah')->name('profilsekolah');
Route::post('/admin/profilsekolah', 'Admincontroller@profilsekolah_store')->name('profilsekolah_store');






// ppdb admin

Route::get('admin/ppdb/calonsiswa/jurusan/{id}', 'ppdbadminController@calonsiswa')->name('calonsiswa');

Route::get('/admin/ppdb/calonsiswa/{id}','ppdbadminController@detailcalonsiswa')->name('detailcalonsiswa');

Route::put('/admin/ppdb/calonsiswa/tolak/{id}','ppdbadminController@tolaksiswa')->name('tolaksiswa') ;
Route::put('/admin/ppdb/calonsiswa/terima/{id}','ppdbadminController@terimasiswa')->name('terimasiswa') ;

Route::get('admin/ppdb/siswa/jurusan/{id}', 'ppdbadminController@siswa')->name('siswa');
Route::get('admin/ppdb/siswa/{id}','ppdbadminController@detailsiswa')->name('detailsiswa');
Route::get('admin/ppdb/siswa/edit/{id}','ppdbadminController@editsiswa')->name('editsiswa');


Route::get('admin/ppdb/siswaditolak', 'ppdbadminController@siswaditolak')->name('siswaditolak');


