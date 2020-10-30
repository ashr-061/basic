<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tindakan".
 *
 * @property int $id_tindakan
 * @property string $id_pasien
 * @property int $tindakan_ke
 * @property string $hasil_periksa
 * @property string $hasil_perkembangan
 * @property string $tanggal
 * @property int|null $id_obat
 * @property int $id_pegawai_pj
 * @property int $tarif
 * @property int $status_bayar
 */
class Tindakan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tindakan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_tindakan', 'id_pasien', 'tindakan_ke', 'hasil_periksa', 'hasil_perkembangan', 'tanggal', 'id_pegawai_pj', 'tarif', 'status_bayar'], 'required'],
            [['id_tindakan', 'tindakan_ke', 'id_obat', 'id_pegawai_pj', 'tarif', 'status_bayar'], 'integer'],
            [['tanggal'], 'safe'],
            [['id_pasien'], 'string', 'max' => 11],
            [['hasil_periksa', 'hasil_perkembangan'], 'string', 'max' => 150],
            [['id_tindakan'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tindakan' => 'Id Tindakan',
            'id_pasien' => 'Id Pasien',
            'tindakan_ke' => 'Tindakan Ke',
            'hasil_periksa' => 'Hasil Periksa',
            'hasil_perkembangan' => 'Hasil Perkembangan',
            'tanggal' => 'Tanggal',
            'id_obat' => 'Id Obat',
            'id_pegawai_pj' => 'Id Pegawai Pj',
            'tarif' => 'Tarif',
            'status_bayar' => 'Status Bayar',
        ];
    }
}
