<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>  
<body ng-app="">

<p>Try writing in the input field:</p>

<form name="myForm">
<input name="myInput" ng-model="myInput" required>
</form>

<p>The input's valid state is:</p>
<h1>{{myForm.myInput.$valid}}</h1>
<h1>{{myForm.myInput.$untouched}}</h1>
<h1>{{myForm.myInput.$touched}}</h1>
<h1>{{myForm.myInput.$pristine}}</h1>
<h1>{{myForm.myInput.$dirty}}</h1>
<h1>{{myForm.myInput.$invalid}}</h1>


</body>
</html>
