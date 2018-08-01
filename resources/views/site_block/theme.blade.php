<div class="col-md-9 col-sm-9 col-xs-12 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms">
	<form class="my_search_form" method="POST" action="{{route('search')}}">
        <input type="text" autocomplete="off" name="q" ng-model="q" ng-keyup="searchGo(q)">
        <button type="submit"><i class="fa fa-search"></i></button>
        <input type="text" ng-If="searchVariant" ng-click="searchCheck(da.name)" ng-repeat="da in searchResult.words" value="@{{da.name}}">
        <input type="text" ng-If="searchVariant" ng-click="searchCheck(da.name)" ng-repeat="da in searchResult.native_language_words" value="@{{da.name}}">
    </form>
    <p class="text-center wow fadeInDown my_title_text">Тема</p>
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