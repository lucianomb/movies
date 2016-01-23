<?php get_header(); ?>

<div class="dynamic-bg" ng-style="{'background-image': 'url(' + currentMovie + ')'}" ng-hide="bgHidden"></div>

<ul class="catalog">
  <li ng-repeat="movie in catalog">
    <a href="#" class="movie-thumb" ng-mouseenter="$parent.currentMovie = movie.poster_url; $parent.bgHidden = false" ng-mouseleave="$parent.bgHidden = true">
      <div class="bg">
        <img ng-src="{{movie.poster_url}}" alt="{{movie.title}}">
        <div class="extra">
          <span>{{movie.year}} - Score: {{movie.rating}}/100</span>
          <p class="title">{{movie.title}}</p>
        </div>
        <div class="description" ng-bind-html="getHtml(movie.short_description)"></div>
      </div>
    </a>
  </li>
</ul>

<?php get_footer(); ?>