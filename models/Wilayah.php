<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wilayah".
 *
 * @property int $id_wilayah
 * @property string $nama_wilayah
 * @property string $kelurahan
 * @property string $kecamatan
 * @property string $kota
 */
class Wilayah extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wilayah';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_wilayah', 'nama_wilayah', 'kelurahan', 'kecamatan', 'kota'], 'required'],
            [['id_wilayah'], 'integer'],
            [['nama_wilayah', 'kelurahan', 'kecamatan', 'kota'], 'string', 'max' => 150],
            [['id_wilayah'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_wilayah' => 'Id Wilayah',
            'nama_wilayah' => 'Nama Wilayah',
            'kelurahan' => 'Kelurahan',
            'kecamatan' => 'Kecamatan',
            'kota' => 'Kota',
        ];
    }
}
