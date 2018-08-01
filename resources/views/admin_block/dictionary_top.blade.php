<div class="col-md-9 col-sm-9 col-xs-12 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms">
    <!-- The form -->
    <form class="my_search_form" method="POST" action="{{route('search')}}">
        <input type="text" autocomplete="off" name="q" ng-model="q" ng-keyup="searchGo(q)">
        <button type="submit"><i class="fa fa-search"></i></button>
        <input type="text" ng-If="searchVariant" ng-click="searchCheck(da.name)" ng-repeat="da in searchResult.words" value="@{{da.name}}">
        <input type="text" ng-If="searchVariant" ng-click="searchCheck(da.name)" ng-repeat="da in searchResult.native_language_words" value="@{{da.name}}">
    </form>
	<p class="text-center wow fadeInDown my_title_text">Словник top {{$top}}</p>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <h3 id="my_cursor_pointer" class="my_cursor_pointer btn btn-success" onclick="openbox('my_form', 'my_cursor_pointer'); return false">Додати слово</h3>
    <div id="my_form" class="my-form" style="display: none;">
    	<form method="post" action="{{route('addtolibrary')}}">
            {{csrf_field()}}
            <div class="form-group">
                <label for="email">Слово:</label>
                <input type="text" class="form-control" name="value">
            </div>
            <p>Rank: </p>
            <label class="radio_container">No top
                <input type="radio" value="no" checked="checked" name="top">
                <span class="checkmark"></span>
            </label>
            <label class="radio_container">top 1000
                <input type="radio" value="1000" name="top">
                <span class="checkmark"></span>
            </label>
            <label class="radio_container">top 5000
                <input type="radio" value="5000" name="top">
                <span class="checkmark"></span>
            </label>
            <label class="radio_container">top 10000
                <input type="radio" value="10000" name="top">
                <span class="checkmark"></span>
            </label>
            <p>Type: </p>
            <label class="radio_container">Word
                <input type="radio" value="word" checked="checked" name="word_or_phrases">
                <span class="checkmark"></span>
            </label>
            <label class="radio_container">Phrases
                <input type="radio" value="phrases" name="word_or_phrases">
                <span class="checkmark"></span>
            </label>
            <div class="form-group">
                <label for="sel1">Тематика:</label>
                <select class="form-control" name="theme_id" id="sel1">
                    <option value="1">Other conversations</option>
                    <option value="2">At acquaintance</option>
                    <option value="3">On a walk</option>
                    <option value="4">In the shop</option>
                    <option value="5">At the airport</option>
                    <option value="6">In the restaurant</option>
                    <option value="7">At the hotel</option>
                    <option value="8">At the hospital</option>
                    <option value="9">In the educational institution</option>
                </select>
            </div>
            <div class="form-group">
                <label for="email">Перевод:</label>
                <input type="text" class="form-control" name="translate[]">
            </div>
            <div id="raz" class="form-group">
                <input type="button" id="button_add_word" value="ще значення">
            </div>
            <button type="submit" class="btn btn-success center-block padding">Save</button>
        </form>
    </div>

    <div class="words" ng-show="@{{library_style}}">
        <table>
            <tr>
                <th class="col-xs-4 col-sm-4 col-md-4">Слово</th>
                <th class="col-xs-7 col-sm-7 col-md-7">Переклад</th>
                <th class="col-xs-1 col-sm-1 col-md-1">Прочитано</th>
            </tr>
            @foreach ($words as $word)
            <tr>
                <td class="col-xs-4 col-sm-4 col-md-4"><span>{{$word->english->name}}</span></td>
                <td class="col-xs-7 col-sm-7 col-md-7">
                @foreach ($word->english->ukraine as $ukraine)
                    @if ($loop->first)
                    <span>{{$ukraine->name}}</span>
                    @else
                    <span>, {{$ukraine->name}}</span>
                    @endif
                @endforeach
                </td>
                <td class="col-xs-1 col-sm-1 col-md-1">
                    <div class="TriSea-technologies-Switch pull-right">
                        <input id="{{$word->english->id}}" ng-model="read_{{$word->english->id}}" ng-click="read({{$word->english->id}}, read_{{$word->english->id}})" type="checkbox"/>
                        <label for="{{$word->english->id}}" class="label-success"></label>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="words phone_words" ng-show="@{{library_phone_style}}">
        <table>
            <tr>
                <th class="col-xs-4 col-sm-4 col-md-4">Слово</th>
                <th class="col-xs-7 col-sm-7 col-md-7">Переклад</th>
                <th class="col-xs-1 col-sm-1 col-md-1">Прочитано</th>
            </tr>
            @foreach ($words as $word)
            <tr>
                <td class="col-xs-4 col-sm-4 col-md-4"><span>{{$word->english->name}}</span></td>
                <td class="col-xs-7 col-sm-7 col-md-7">
                @foreach ($word->english->ukraine as $ukraine)
                    @if ($loop->first)
                    <span>{{$ukraine->name}}</span>
                    @else
                    <span>, {{$ukraine->name}}</span>
                    @endif
                @endforeach
                </td>
                <td class="col-xs-1 col-sm-1 col-md-1">
                    <div class="TriSea-technologies-Switch pull-right">
                        <input id="{{$word->english->id}}" ng-model="read_{{$word->english->id}}" ng-click="read({{$word->english->id}}, read_{{$word->english->id}})" type="checkbox"/>
                        <label for="{{$word->english->id}}" class="label-success"></label>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="words phone_words" ng-show="@{{library_small_phone_style}}">
        <table>
            <tr>
                <th class="col-xs-4 col-sm-4 col-md-4">Слово</th>
                <th class="col-xs-7 col-sm-7 col-md-7">Переклад</th>
                <th class="col-xs-1 col-sm-1 col-md-1">Прочитано</th>
            </tr>
            @foreach ($words as $word)
            <tr>
                <td class="col-xs-4 col-sm-4 col-md-4"><span>{{$word->english->name}}</span></td>
                <td class="col-xs-7 col-sm-7 col-md-7">
                @foreach ($word->english->ukraine as $ukraine)
                    @if ($loop->first)
                    <span>{{$ukraine->name}}</span>
                    @else
                    <span>, {{$ukraine->name}}</span>
                    @endif
                @endforeach
                </td>
                <td class="col-xs-1 col-sm-1 col-md-1">
                    <div class="TriSea-technologies-Switch pull-right">
                        <input id="{{$word->english->id}}" ng-model="read_{{$word->english->id}}" ng-click="read({{$word->english->id}}, read_{{$word->english->id}})" type="checkbox"/>
                        <label for="{{$word->english->id}}" class="label-success"></label>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>