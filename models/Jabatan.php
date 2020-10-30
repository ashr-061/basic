<?php
namespace app\models;

//use yii\base\Model;
use yii\db\ActiveRecord;

//class Wilayah extends Model{
class Jabatan extends ActiveRecord{

//	public $nama;
//	public $jabatan;
//	public $email;
//	public $keterangan;

	public function rules(){
		return [
			//value bersifat required, harus diisi
			[['nama', 'jabatan', 'email', 'keterangan'], 'required'],

			//email diisi dalam format email
			['email', 'email'],

			//ketarangan memiliki panjang maksimal 150 karakter
			['keterangan', 'string', 'max'=>150],
		];
	}

	//dropdown yang dipanggil di formWilayah
	public function dataJabatan(){
		return [
			1 => 'CEO',
			2 => 'COO',
			3 => 'Supervisor'
		];
	}

	public function labelJabatan(){
		if($this->jabatan==1){
			return 'CEO';
		} else if($this->jabatan==2){
			return 'COO';
		} else if($this->jabatan==3){
			return 'Supervisor'; 
		} else {
			return 'unknown';
		}
	}
}

?>