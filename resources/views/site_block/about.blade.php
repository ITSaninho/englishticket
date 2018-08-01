<div class="col-md-9 col-sm-9 col-xs-12 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="200ms">
    <form class="my_search_form" method="POST" action="{{route('search')}}">
        <input type="text" autocomplete="off" name="q" ng-model="q" ng-keyup="searchGo(q)">
        <button type="submit"><i class="fa fa-search"></i></button>
        <input type="text" ng-If="searchVariant" ng-click="searchCheck(da.name)" ng-repeat="da in searchResult.words" value="@{{da.name}}">
        <input type="text" ng-If="searchVariant" ng-click="searchCheck(da.name)" ng-repeat="da in searchResult.native_language_words" value="@{{da.name}}">
    </form>
	<div class="section-header">
        <h2 class="section-title text-center wow fadeInDown">Про нас</h2>
    </div>
    <div>
        <div ng-if="contactMessage == true" class="alert alert-success">
            The message was sent successfully
        </div>

    	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

		<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

		<form  name="contact-form">

            @guest
            <div class="form-group">
                <input type="text" name="name" ng-model="contact.name" class="form-control" placeholder="Ім'я" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" ng-model="contact.email" class="form-control" placeholder="Електронна адреса" required>
            </div>
            @endguest
            <div class="form-group">
                <input type="text" name="subject" ng-model="contact.subject" class="form-control" placeholder="Тема" required>
            </div>
            <div class="form-group">
                <textarea name="text" ng-model="contact.text" class="form-control" rows="8" placeholder="Текст повідомлення" required></textarea>
            </div>
            <button ng-click="sendMessage(contact)" class="btn btn-primary">Відправити</button>
        </form>
    </div>


</div><!--/.col-md-4-->