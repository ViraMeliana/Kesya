<style>
    th{
        width: 50%;
        text-align: center;
    }
    tr{
        width: 50%;
        text-align: center;
    }
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>
<p style="text-align: center; font-weight: bold">{{ trans('cruds.pembiayaanMudharabah.title') }}</p>
<table style="width: 100%;">
    <tbody>
    <tr>
        <th>
            {{ trans('cruds.pembiayaanMudharabah.fields.id') }}
        </th>
        <td>
            {{ $result['id']  }}
        </td>
    </tr>
    <tr>
        <th>
            {{ trans('cruds.pembiayaanMudharabah.fields.nama_nasabah') }}
        </th>
        <td>
            {{ $result['collection']->nama_nasabah }}
        </td>
    </tr>
    <tr>
        <th>
            {{ trans('cruds.pembiayaanMudharabah.fields.nama_bank') }}
        </th>
        <td>
            {{ $result['collection']->nama_bank }}
        </td>
    </tr>
    <tr>
        <th>
            {{ trans('cruds.pembiayaanMudharabah.fields.kebutuhan_modal') }}
        </th>
        <td>
            {{ ($result['collection']->kebutuhan_modal) }}
        </td>
    </tr>
    <tr>
        <th>
            Pembiayaan Bank
        </th>
        <td>
            {{ ($result['collection']->kebutuhan_modal) }}
        </td>
    </tr>
    <tr>
        <th>
            {{ trans('cruds.pembiayaanMudharabah.fields.modal_nasabah') }}
        </th>
        <td>
            {{ ($result['collection']->modal_nasabah) }}
        </td>
    </tr>
    <tr>
        <th>
            {{ trans('cruds.pembiayaanMudharabah.fields.proyeksi_penerimaan_perbulan') }}
        </th>
        <td>
            {{ ($result['collection']->proyeksi_penerimaan_perbulan) }}
        </td>
    </tr>
    <tr>
        <th>
            Proyeksi Penerimaan Perbulan
        </th>
        <td>
            {{ number_format($result['collection']->proyeksi_penerimaan_pertahun, 0, ',', '.') }}
        </td>
    </tr>
    <tr>
        <th>
            {{ trans('cruds.pembiayaanMudharabah.fields.jangka_waktu') }}
        </th>
        <td>
            {{ $result['collection']->jangka_waktu }}
        </td>
    </tr>
    <tr>
        <th>
            {{ trans('cruds.pembiayaanMudharabah.fields.rate') }}
        </th>
        <td>
            {{ $result['collection']->rate }}%
        </td>
    </tr>
    <tr>
        <th>
            Ekpektasi bagi hasil per tahun (Rp)
        </th>
        <td>
            {{ number_format($result['collection']->nisbah_pertahun, 0, ',', '.') }}
        </td>
    </tr>
    <tr>
        <th>
            Nisbah bank (%)
        </th>
        <td>
            {{ $result['collection']->nisbah_bank }}%
        </td>
    </tr>
    <tr>
        <th>
            Nisbah nasabah (%)
        </th>
        <td>
            {{ $result['collection']->nisbah_nasabah }}%
        </td>
    </tr>
    <tr style="background-color: darkgreen; color: white">
        <th colspan="2" >
            Perhitungan bagi hasil riil yang dibayarkan nasabah
        </th>
    </tr>
    <tr>
        <th>
            {{ trans('cruds.pembiayaanMudharabah.fields.penghasilan') }}
        </th>
        <td>
            {{ ($result['collection']->penghasilan) }}
        </td>
    </tr>
    <tr>
        <th>
            Bagi Hasil Laba/Rugi Nasabah
        </th>
        <td>
            {{ number_format($result['collection']->laba_nasabah, 0, ',', '.') }}
        </td>
    </tr>
    <tr>
        <th>
            Bagi Hasil Laba/Rugi Bank
        </th>
        <td>
            {{ number_format($result['collection']->laba_bank, 0, ',', '.') }}
        </td>
    </tr>
    </tbody>
</table>
