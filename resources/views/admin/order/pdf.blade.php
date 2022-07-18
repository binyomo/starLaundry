<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        body{
            margin-top: -25px;
        }

        .text-1{
            font-size: 0.7em;
            text-align: center;
        }

        .text-2{
            font-size: 0.45em;
            text-align: center;
            margin-bottom: 5px;
        }

        table{
            margin: 2.5px 0px;
            font-size: 0.35em;
            width: 100%;
        }

        thead{
            border-bottom: 0.5px black solid;
        }

        tfoot{
            border-top: 0.5px black solid;
        }

        td{
            padding: 2.5px;
        }

        .info{
            font-size: 0.275em;
            margin: 0;
        }

        .info tbody td{
            padding: 0;
            text-align: center;
        }

        .garis{
            font-size: 0.25em;
            font-weight: bold;
            margin: 0;
        }

        .note{
            font-size: 0.3em;
            margin-bottom: 2.5px;
        }

        .info-2{
            font-size: 0.375em;
            margin: 2.5px 0;
            text-align: right;
        }

        .copy{
            font-size: 0.25em;
            margin-top: 2.5px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="text-1">STAR LAUNDRY</div>
    <div class="text-2">{{ $order->outlet->name }}</div>

    <div class="garis">///////////////////////////////////////////////////////////////////////////////////////////////</div>

    <table class="info">
        <tbody>
            <tr>
                <td>Code : <strong>{{ $order->code }}</strong></td>
                <td>Customer : <strong>{{ $order->customer }}</strong></td>
            </tr>
            <tr>
                <td>Member : <strong>
                    @if ( $order->member )
                        {{ $order->member->nickname }}
                    @else
                        -
                    @endif</strong>
                </td>
                <td>Ambil: <strong>{{ $order->ambil->format('d/m/Y') }}</strong></td>
            </tr>
        </tbody>
    </table>

    <div class="garis">///////////////////////////////////////////////////////////////////////////////////////////////</div>

    <table>
        <thead>
            <tr>
                <th colspan="1">No</th>
                <th colspan="2">Barang</th>
                <th colspan="2">Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->barang as $barang)
            <tr>
                <td colspan="1">{{ $loop->iteration }}</td>
                <td colspan="2">{{ $barang->name }} - {{ $barang->jumlah }} 
                    @if($barang->type == 0)
                        Kg
                    @else
                        Pcs
                    @endif
                </td>
                <td colspan="2">{{ $barang->harga*$barang->pivot->jumlah }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="2">Harga</th>
                <th colspan="3">{{ $total }}</th>
            </tr>
        </tfoot>
    </table>

    <div class="note">Note : <strong>{{ $order->note }}</strong></div>

    <div class="garis">///////////////////////////////////////////////////////////////////////////////////////////////</div>

    <div class="info-2">
        <div>Discount : <strong>
            @if ( $order->discount )
                @if ( $order->discount->type == 0 )
                    {{ $order->discount->discount }}
                @else
                    {{ $order->discount->discount }} %
                @endif
            @else
                0
            @endif</strong> 
        </div>
        <div>Total : <strong>
            @if ( $order->discount )
                @if ( $order->discount->type == 0 )
                    {{ $total - $order->discount->discount }}
                @else
                    {{ $total - $total * $order->discount->discount / 100 }}
                @endif
            @else
                {{ $total }}
            @endif</strong> 
        </div>
    </div>

    <div class="garis">///////////////////////////////////////////////////////////////////////////////////////////////</div>

    <div class="copy">
        <div>Terima Kasih Sudah Menggunakan Jasa Star Laundry</div>
        <div>Bawa Struk Ini Saat Pengambilan Barang</div>
        <div>***Star Laundry***</div>
    </div>

</body>
</html>