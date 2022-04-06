<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Isi Testimoni</h4>

                <form class="forms-sample" action="{{url('/uploadtestimoni',$data2->id_pesanan)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="judul">Keterangan Isian Testimoni</label>
                        <input class="form-control" name="isi_testimoni" value="{{$data2->balasan_testimoni}}" required>
                    </div>
                    <!-- <div class="form-group">
                        <label for="judul">Judul Artikel</label>
                        <input class="form-control" name="judul_artikel" value="{{$data2->total_pesanan}}" required>
                    </div> -->
                    <button type="submit" class="btn btn-primary mr-2" value="Update">Submit testim</button>
                    <button type="reset" class="btn btn-dark">Batal</button>
                </form>

            </div>
        </div>
    </div>
</div>