<div class="col-md-9 col-sm-9 col-xs-12 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms">
	<form class="my_search_form" method="POST" action="{{route('search')}}">
        <input type="text" autocomplete="off" name="q" ng-model="q" ng-keyup="searchGo(q)">
        <button type="submit"><i class="fa fa-search"></i></button>
        <input type="text" ng-If="searchVariant" ng-click="searchCheck(da.name)" ng-repeat="da in searchResult.words" value="@{{da.name}}">
        <input type="text" ng-If="searchVariant" ng-click="searchCheck(da.name)" ng-repeat="da in searchResult.native_language_words" value="@{{da.name}}">
    </form>
	<div class="section-header">
        <h2 class="section-title text-center wow fadeInDown">Профіль</h2>
    </div>
    <div>
    	<p>Name: {{Auth::user()->name}}</p>
    	<p>Email: {{Auth::user()->email}}</p>
    	<!-- <p>Слів прочитано: </p>
    	<p>Фраз прочитано: </p> -->
    </div>
</div><!--/.col-md-4-->