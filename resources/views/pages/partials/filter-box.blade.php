<div class="list-movie-filter filter-box1" style="margin: 20px;" >
    <div class="list-movie-filter-main">
        <form method="get" role="search">
            <div class="row">
                <div class="col-md-2">
                    <div class="list-movie-filter-item">
                        <label for="sort" style="color:white">Sắp xếp</label>
                        <select class="form-control select-box" name="sort">
                            <option value="">---Sắp xếp---</option>
                            <option {{ request()->sort == "updated_at" ? "selected" : "" }} value="updated_at">Ngày đăng</option>
                            <option {{ request()->sort == "year"? "selected" : "" }} value="year">Năm sản xuất</option>
                            <option {{ request()->sort == "title" ? "selected" : "" }} value="title">Tên phim</option>
                            <option {{ request()->sort == "view" ? "selected" : "" }} value="view">Lượt xem</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="list-movie-filter-item">
                        <label for="type" style="color:white">Định dạng</label>
                        <select class="form-control select-box" name="type">
                            <option selected="" value="">Mọi định dạng</option>
                            <option {{ request()->type == "0" ? "selected" : "" }} value="0">Phim lẻ</option>
                            <option {{ request()->type == "1" ? "selected" : "" }} value="1">Phim bộ</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="list-movie-filter-item">
                        <label for="genre" style="color:white">Thể Loại</label>
                        <select class="form-control select-box" name="genre">
                            <option value="">Tất cả thể loại</option>
                            @foreach ($genres as $gen_filter )
                                <option {{ request()->genre == $gen_filter->id ? "selected" : "" }} value="{{ $gen_filter->id }}">{{ $gen_filter->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="list-movie-filter-item">
                        <label for="country" style="color:white">Quốc gia</label>
                        <select class="form-control select-box" name="country">
                            <option value="">Tất cả quốc gia</option>
                            @foreach ($country as $country_filter )
                                <option {{ request()->country == $country_filter->id ? "selected" : "" }} value="{{ $country_filter->id }}">{{ $country_filter->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="list-movie-filter-item">
                        <label for="year" style="color:white">Năm</label>
                        <select class="form-control select-box" name="year">
                            <option value="">Tất cả năm</option>
                            @for ($i = 1996; $i <= now()->year ;$i++)
                                <option {{ request()->year == $i ? "selected" : "" }} value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" style="margin-top: 25px" class="btn btn-primary btn-filter-movie">
                        <span>Lọc phim</span>
                    </button>
                </div>
            </div>
            <div class="clear"></div>
        </form>
    </div>
</div>