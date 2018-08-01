<div class="col-md-9 col-sm-9 col-xs-12 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms">
	<form class="my_search_form" method="POST" action="{{route('search')}}">
        <input type="text" autocomplete="off" name="q" ng-model="q" ng-keyup="searchGo(q)">
        <button type="submit"><i class="fa fa-search"></i></button>
        <input type="text" ng-If="searchVariant" ng-click="searchCheck(da.name)" ng-repeat="da in searchResult.words" value="@{{da.name}}">
        <input type="text" ng-If="searchVariant" ng-click="searchCheck(da.name)" ng-repeat="da in searchResult.native_language_words" value="@{{da.name}}">
    </form>
    <p class="text-center wow fadeInDown my_title_text">Тема: {{$theme->title}}</p>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <h3 id="my_cursor_pointer" class="my_cursor_pointer btn btn-success" onclick="openbox('my_form', 'my_cursor_pointer'); return false">Додати фразу</h3>
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
                <input type="radio" value="word" name="word_or_phrases">
                <span class="checkmark"></span>
            </label>
            <label class="radio_container">Phrases
                <input type="radio" value="phrases" checked="checked" name="word_or_phrases">
                <span class="checkmark"></span>
            </label>
            <p>Themes:</p>
            <label class="radio_container">{{$theme->title}}
                <input type="radio" value="{{$theme->id}}" checked="checked" name="theme_id">
                <span class="checkmark"></span>
            </label>
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
        	@foreach ($theme_phrases as $phrases)
            <tr>
                <th class="col-xs-2 col-sm-2 col-md-2">Речення</th>
                <th class="col-xs-10 col-sm-10 col-md-10">{{$phrases->name}}</th>
            </tr>
            <tr>
                <th class="col-xs-2 col-sm-2 col-md-2">Переклад</th>
                <th class="col-xs-10 col-sm-10 col-md-10">
                    @foreach ($phrases->ukraine as $ukraine)
                        {{$ukraine->name}}
                    @endforeach
                </th>
            </tr>
            <tr class="phrases-bottum_border">
                <th class="col-xs-2 col-sm-2 col-md-2">Прочитано</th>
                <th class="col-xs-10 col-sm-10 col-md-10">
                    <div class="TriSea-technologies-Switch pull-right">
                        <input id="{{$phrases->id}}" ng-model="read_{{$phrases->id}}" ng-click="read({{$phrases->id}}, read_{{$phrases->id}})" type="checkbox"/>
                        <label for="{{$phrases->id}}" class="label-success"></label>
                    </div>
                </th>
            </tr>
            @endforeach
        </table>
    </div>

    <div class="words phone_words" ng-show="@{{library_phone_style}}">
        <table>
            @foreach ($theme_phrases as $phrases)
            <tr>
                <th class="col-xs-2 col-sm-2 col-md-2">Речення</th>
                <th class="col-xs-10 col-sm-10 col-md-10">{{$phrases->name}}</th>
            </tr>
            <tr>
                <th class="col-xs-2 col-sm-2 col-md-2">Переклад</th>
                <th class="col-xs-10 col-sm-10 col-md-10">
                    @foreach ($phrases->ukraine as $ukraine)
                        {{$ukraine->name}}
                    @endforeach
                </th>
            </tr>
            <tr class="phrases-bottum_border">
                <th class="col-xs-2 col-sm-2 col-md-2">Прочитано</th>
                <th class="col-xs-10 col-sm-10 col-md-10">
                    <div class="TriSea-technologies-Switch pull-right">
                        <input id="{{$phrases->id}}" ng-model="read_{{$phrases->id}}" ng-click="read({{$phrases->id}}, read_{{$phrases->id}})" type="checkbox"/>
                        <label for="{{$phrases->id}}" class="label-success"></label>
                    </div>
                </th>
            </tr>
            @endforeach
        </table>
    </div>

    <div class="words phone_words" ng-show="@{{library_small_phone_style}}">
        <table>
            @foreach ($theme_phrases as $phrases)
            <tr>
                <th class="col-xs-2 col-sm-2 col-md-2">en</th>
                <th class="col-xs-10 col-sm-10 col-md-10">{{$phrases->name}}</th>
            </tr>
            <tr>
                <th class="col-xs-2 col-sm-2 col-md-2">ua</th>
                <th class="col-xs-10 col-sm-10 col-md-10">
                    @foreach ($phrases->ukraine as $ukraine)
                        {{$ukraine->name}}
                    @endforeach
                </th>
            </tr>
            <tr class="phrases-bottum_border">
                <th class="col-xs-2 col-sm-2 col-md-2"></th>
                <th class="col-xs-10 col-sm-10 col-md-10">
                    <div class="TriSea-technologies-Switch pull-right">
                        <input id="{{$phrases->id}}" ng-model="read_{{$phrases->id}}" ng-click="read({{$phrases->id}}, read_{{$phrases->id}})" type="checkbox"/>
                        <label for="{{$phrases->id}}" class="label-success"></label>
                    </div>
                </th>
            </tr>
            @endforeach
        </table>
    </div>
</div><!--/.col-md-4-->