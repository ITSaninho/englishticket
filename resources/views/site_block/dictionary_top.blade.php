<div class="col-md-9 col-sm-9 col-xs-12 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms">
    <!-- The form -->
    <form class="my_search_form" method="POST" action="{{route('search')}}">
        <input type="text" autocomplete="off" name="q" ng-model="q" ng-keyup="searchGo(q)">
        <button type="submit"><i class="fa fa-search"></i></button>
        <input type="text" ng-If="searchVariant" ng-click="searchCheck(da.name)" ng-repeat="da in searchResult.words" value="@{{da.name}}">
        <input type="text" ng-If="searchVariant" ng-click="searchCheck(da.name)" ng-repeat="da in searchResult.native_language_words" value="@{{da.name}}">
    </form>
	<p class="text-center wow fadeInDown my_title_text">Словник top {{$top}}</p>
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