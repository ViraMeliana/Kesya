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
<p style="text-align: center; font-weight: bold">{{ trans('cruds.tabunganMudharabah.title') }}</p>
<table style="width: 100%;">
    <tbody>
    <tr>
        <th>
            {{ trans('cruds.tabunganMudharabah.fields.id') }}
        </th>
        <td>
            {{ $result['id'] }}
        </td>
    </tr>
    <tr>
        <th>
            {{ trans('cruds.tabunganMudharabah.fields.nama_nasabah') }}
        </th>
        <td>
            {{ $result['collection']->nama_nasabah }}
        </td>
    </tr>
    <tr>
        <th>
            {{ trans('cruds.tabunganMudharabah.fields.nama_bank') }}
        </th>
        <td>
            {{ $result['collection']->nama_bank }}
        </td>
    </tr>
    <tr>
        <th>
            {{ trans('cruds.tabunganMudharabah.fields.nisbah_percent_nasabah') }}
        </th>
        <td>
            {{ $result['collection']->nisbah_percent_nasabah }}%
        </td>
    </tr>
    <tr>
        <th>
            {{ trans('cruds.tabunganMudharabah.fields.nisbah_percent_bank') }}
        </th>
        <td>
            {{ $result['collection']->nisbah_percent_bank }}%
        </td>
    </tr>
    <tr>
        <th>
            {{ trans('cruds.tabunganMudharabah.fields.tanggal') }}
        </th>
        <td>
            {{ $result['collection']->tanggal }}
        </td>
    </tr>
    <tr>
        <th>
            {{ trans('cruds.tabunganMudharabah.fields.avg_nasabah') }}
        </th>
        <td>
            {{ ($result['collection']->avg_nasabah) }}
        </td>
    </tr>
    <tr>
        <th>
            {{ trans('cruds.tabunganMudharabah.fields.total') }}
        </th>
        <td>
            {{ ($result['collection']->total) }}
        </td>
    </tr>
    <tr>
        <th>
            {{ trans('cruds.tabunganMudharabah.fields.pendapatan') }}
        </th>
        <td>
            {{ ($result['collection']->pendapatan) }}
        </td>
    </tr>
    <tr>
        <th>
            Bagi Hasil untuk Bank
        </th>
        <td>
            {{ number_format($result['collection']->nisbah_bank, 0, ',', '.') }}
        </td>
    </tr>
    <tr>
        <th>
            Bagi Hasil untuk Semua Nasabah Penabung
        </th>
        <td>
            {{ number_format($result['collection']->nisbah_total_nasabah, 0, ',', '.') }}
        </td>
    </tr>
    <tr>
        <th>
            Bagi Hasil untuk nasabah {{ $result['collection']->nama_nasabah }}
        </th>
        <td>
            {{ number_format($result['collection']->nisbah_nasabah, 0, ',', '.') }}
        </td>
    </tr>
    <tr>
        <th>
            Tabungan Nasabah {{ $result['collection']->nama_nasabah }} pada awal bulan selanjutnya
        </th>
        <td>
            {{ number_format($result['collection']->tabungan_awal, 0, ',', '.') }}
        </td>
    </tr>
    </tbody>
</table>
