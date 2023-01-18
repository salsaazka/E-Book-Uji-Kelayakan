<br>

<body style="font-family: sans-serif" onload="window.print()">
    <center>
        <table width="94%" border="0">
            <tr>
                <td rowspan="4" width="10%">
                    <center>
                        <div>
                            <img src="{{ asset('assets/img/logo-wk.png') }}" width="100px">
                        </div>
                    </center>
                </td>
                <td>
                    <b>PERPUSTAKAAN ONLINE (E-BOOK)</b><br>
                    <b>SMK WIKRAMA BOGOR TP. 2023-2024</b><br>
                </td>
            </tr>

        </table>
    </center>
    <br>
    <center><h2><b>DETAIL BUKU</b></h2></center>
    <center><h3><b>SMK Wikrama Bogor TP. 2023-2024</b></h3></center>
    <br>
    <table width="50%" border-radius="0" style="margin-left:3%;margin-right:2%;float:left">
        
        @csrf
        <tr>
            <td colspan="3" style="padding: 10px 0;"></td>
        </tr>
            <td colspan="3" style="padding: 8px 0;"></td>
        </tr>
        <tr>
            <td width="30%" style="font-size: 13px"><b>TANGGAL UNDUH</b></td>
            <td width="3%">:</td>
            <td>{{ $book->created_at->format('j F, Y') }}</td>
        </tr>
        <tr>
            <td width="30%" style="font-size: 13px"><b>NO</b></td>
            <td width="3%">:</td>
            <td>{{ $book->id }}</td>
        </tr>
        <tr>
            <td width="30%" style="font-size: 13px"><b>JUDUL BUKU</b></td>
            <td width="3%">:</td>
            <td>{{ $book->title }}</td>
        </tr>
        <tr>
            <td width="30%" style="font-size: 13px"><b>PENULIS BUKU</b></td>
            <td width="3%">:</td>
            <td>{{ $book->writer }}</td>
        </tr>
        <tr>
            <td width="30%" style="font-size: 13px"><b>PENERBIT BUKU</b></td>
            <td width="3%">:</td>
            <td>{{ $book->publisher }}</td>
        </tr>
        <tr>
            <td width="30%" style="font-size: 13px"><b>NO ISBN</b></td>
            <td width="3%">:</td>
            <td>{{ $book->no }}</td>
        </tr>
        <tr>
            <td width="30%" style="font-size: 13px"><b>SINOPSIS</b></td>
            <td width="3%">:</td>
            <td>{{ $book->synopsis }}</td>
        </tr>
    
        <tr>
            <td colspan="3" style="padding: 10px 0;"></td>
        </tr>
        
    </table>
  
</body>