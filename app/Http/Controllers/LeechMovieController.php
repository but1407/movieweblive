<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Episode;
use App\Models\LinkMovie;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LeechMovieController extends Controller
{
    public function leech_movie()
    {
        $urls = Http::get('https://ophim1.com/danh-sach/phim-moi-cap-nhat?page=1')->json();

        return view('admin.leech.index', [
            'urls' => $urls,
            'title' => 'Leech Movie'
        ]);
    }
    public function leech_detail($slug)
    {
        $url = Http::get("https://ophim1.com/phim/" . $slug)->json();
        return view('admin.leech.detail', [
            'url' => $url,
            'title' => 'Leech Detail'
        ]);
    }
    public function leech_store($slug)
    {
        $url = Http::get("https://ophim1.com/phim/" . $slug)->json();
        $info_movie = $url['movie'];
        $country = Country::where('slug', $info_movie['country'][0]['slug'])->first();
        $category = Country::where('slug', $info_movie['category'][0]['slug'])->first();

        $movie = Movie::create([
            'title' => $info_movie['name'],
            'description' => $info_movie['content'],
            'trailer' => $info_movie['trailer_url'],
            'sotap' => $info_movie['episode_total'],
            'thuocphim' => $info_movie['chieurap'] == false ? '1' : '0',
            'status' => 0,
            'slug' => $info_movie['slug'],

            'resolution' => 0,
            'movie_duration' => $info_movie['time'],
            'image' => $info_movie['thumb_url'],
            'country_id' => $country->id ?? 0,
            'name_eng' => $info_movie['origin_name'],
            'vietsub' => $info_movie['lang'] == 'vietsub' ? 1 : 0,
            'genre_id' => 0,
            'hot_movie' => 0,
            'category_id' => $category->id ?? 0,
        ]);

        // //add more genre
        // $movie->movieGenres()->attach($request->genre);

        //add more category
        // $movie->movieCategories()->attach($info_movie['category']);
        return redirect()->back()->with('success', 'Add movie Successfully');
    }
    public function leech_episode($slug)
    {
        $url = Http::get("https://ophim1.com/phim/" . $slug)->json();
        return view('admin.leech.episode', [
            'url' => $url,
            'title' => 'Leech Episode'
        ]);
    }
    public function leech_episode_store(Request $request, $slug)
    {
        $movie = Movie::where('slug', $slug)->first();
        if (!$movie) {
            return redirect()->back()->with('error', 'Movie does not exist in your database');
        }
        $url = Http::get("https://ophim1.com/phim/" . $slug)->json();
        foreach ($url['episodes'] as $res) {
            foreach ($res['server_data'] as $key => $res_data) {
                $ep = new Episode();
                $ep->movie_id = $movie->id;
                $ep->episode = $res_data['name'];
                $ep->movie_link = '<p><iframe width="560" height="315" src="' . $res_data['link_embed'] . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe></p>';
                if ($key == 0) {
                    $link_movie = LinkMovie::orderBy('id', 'desc')->first();
                    $ep->server = $link_movie->id;
                } else {
                    $link_movie = LinkMovie::orderBy('id', 'asc')->first();
                    $ep->server = $link_movie->id;
                }
                $ep->save();
            }
            return redirect()->back()->with('success', 'Add episode successfully');
        }

        return view('admin.leech.episode', [
            'url' => $url,
            'title' => 'Leech Episode'
        ]);
    }
    public function watch_leech_edetail(Request $request, $slug)
    {
        $slug = $request->slug;
        $resp = Http::get('https://ophim1.com/phim/' . $slug)->json();
        $resp_array[] = $resp['movie'];

        $output['content_title'] = '<h3 style="text-align: center;text-transform: uppercase;">' . $resp['movie']['name'] . '</h3>';

        $output['content_detail'] = '
            <div class="row">
                <div class="col-md-5"><img src="' . $resp['movie']['thumb_url'] . '" width="100%"></div>
                <div class="col-md-7">
                    <h5><b>Tên phim :</b>' . $resp['movie']['name'] . '</h5>
                    <p><b>Tên tiếng anh:' . $resp['movie']['origin_name'] . '</b></p>
                    <p><b>Trạng thái :</b> ' . $resp['movie']['episode_current'] . '</p>
                    <p><b>Số tập :</b> ' . $resp['movie']['episode_total'] . '</p>
                    <p><b>Thời lượng : </b>' . $resp['movie']['time'] . '</p>
                    <p><b>Năm phát hành : </b>' . $resp['movie']['year'] . '</p>
                    <p><b>Chất lượng : </b>' . $resp['movie']['quality'] . '</p>
                    <p><b>Ngôn ngữ : </b>' . $resp['movie']['lang'] . '</p>';
        foreach ($resp['movie']['director'] as $dir) {
            $output['content_detail'] .= 'Đạo diễn: <span class="badge badge-pill badge-info">' . $dir . '</span><br>';
        }
        $output['content_detail'] .= '<b>Thể loại :</b>';

        foreach ($resp['movie']['category'] as $cate) {
            $output['content_detail'] .= '
                        <p><span class="badge badge-pill badge-info">' . $cate['name'] . '</span></p>';
        }
        $output['content_detail'] .= '<b>Diễn viên :</b>';
        foreach ($resp['movie']['actor'] as $act) {
            $output['content_detail'] .= '
                        <p><span class="badge badge-pill badge-info">' . $act . '</span></p>';
        }
        $output['content_detail'] .= '<b>Quốc gia :</b>';
        foreach ($resp['movie']['country'] as $country) {
            $output['content_detail'] .= '
                        <p><span class="badge badge-pill badge-info">' . $country['name'] . '</span></p>';
        }
        $output['content_detail'] .= '

                </div>
            </div>
        ';

        return $output;
    }
}
