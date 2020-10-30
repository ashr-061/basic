<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pegawai".
 *
 * @property int $id_pegawai
 * @property string $nama_pegawai
 * @property string $poli
 * @property string|null $keterangan
 */
class Pegawai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pegawai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pegawai', 'nama_pegawai', 'poli'], 'required'],
            [['id_pegawai'], 'integer'],
            [['nama_pegawai', 'poli', 'keterangan'], 'string', 'max' => 150],
            [['id_pegawai'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pegawai' => 'Id Pegawai',
            'nama_pegawai' => 'Nama Pegawai',
            'poli' => 'Poli',
            'keterangan' => 'Keterangan',
        ];
    }
}
