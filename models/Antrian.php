<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "antrian".
 *
 * @property int $id_antrian
 * @property string $no_ktp
 * @property string $poli
 * @property string $tanggal
 * @property int $sudah_dilayani
 * @property string|null $keterangan
 */
class Antrian extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'antrian';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_antrian', 'no_ktp', 'poli', 'tanggal', 'sudah_dilayani'], 'required'],
            [['id_antrian', 'sudah_dilayani'], 'integer'],
            [['tanggal'], 'safe'],
            [['no_ktp'], 'string', 'max' => 16],
            [['poli'], 'string', 'max' => 50],
            [['keterangan'], 'string', 'max' => 150],
            [['id_antrian'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_antrian' => 'Id Antrian',
            'no_ktp' => 'No Ktp',
            'poli' => 'Poli',
            'tanggal' => 'Tanggal',
            'sudah_dilayani' => 'Sudah Dilayani',
            'keterangan' => 'Keterangan',
        ];
    }
}
