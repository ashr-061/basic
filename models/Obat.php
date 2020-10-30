<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "obat".
 *
 * @property int $id_obat
 * @property string $nama_obat
 * @property int $tarif_obat
 * @property string|null $keterangan
 */
class Obat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'obat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_obat', 'nama_obat', 'tarif_obat'], 'required'],
            [['id_obat', 'tarif_obat'], 'integer'],
            [['nama_obat', 'keterangan'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_obat' => 'Id Obat',
            'nama_obat' => 'Nama Obat',
            'tarif_obat' => 'Tarif Obat',
            'keterangan' => 'Keterangan',
        ];
    }
}
