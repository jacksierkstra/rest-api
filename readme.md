## Rest API
This is a boilerplate project which will have some handy stuff in it for rest API's. This is really a personal project, but if I can make anyone happy with it, that would be nice.

These are versions of software that I use in this project:

```json
require": {
    "php": ">=5.5.9",
    "laravel/lumen-framework": "5.1.*",
    "vlucas/phpdotenv": "~1.0"
}
```
### Handy stuff
What I needed, and Lumen didn't support this out of the box, is API versioning. Well, I don't really need it, but it was fun to develop this mechanism.

|Features|implemented|
|---------|:------|
|API versioning|Header|

The way header versioning is implemented is supplying the following headers:

```
HTTP GET:
https://yourapi.com/api/foo
api-version: 2
```

If you don't supply this header, the application will fallback to a given version. Right now, this is just version 1. If an invalid api version is supplied in the request header, it will also fallback to version 1. You can see how this works in the tests i've written.

There are several options for implementing API versioning, but I decided to stick with the header version. I got inspiration from [this](http://www.troyhunt.com/2014/02/your-api-versioning-is-wrong-which-is.html) link where three wrong ways of implementing API versioning are supplied. I chose the one that was the least "wrong" from my point of view.
