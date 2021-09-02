# Kumu Test API Spec

## Running API tests locally

To locally run the provided Postman collection against your backend, execute:

```
APIURL=http://127.0.0.1:8000/api
```


### Authentication Header:

`Authorization: Bearer Token token.here`

## JSON Objects returned by API:

Make sure the right content type like `Content-Type: application/json; charset=utf-8` is correctly returned.

### Token (for authentication)

```JSON
{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiOTRkYTAyMzkwZTVmZjAxMTJkM2IyNTY0ZTc5MjdiZDMxODM0NWY5MjgwOTY1NTZmZTgzYzlkYzMzOWM5MGQxNDU1ZWZjNjc4MjIwOWZmMjkiLCJpYXQiOjE2Mjk4OTQ1NTcsIm5iZiI6MTYyOTg5NDU1NywiZXhwIjoxNjYxNDMwNTU3LCJzdWIiOiIyNyIsInNjb3BlcyI6W119.sJy4s5WBJa5KS8j1XoCRmj5Nkp_yQnGFHUUubH_I_b5bnVmK9x4sFtFg9W8V3C6gDyiX5TVNxeWwfEmzrK551AqJNfs4TpgrwQMRSVEFSwBkDG_wkdbpC7wcxuySaGODyeUifkveoZpgA1T8h8fGNW4rBownPgoeTkLy2bkx7vOCaRBKXNc4n2A81R_eLqZDPTnr-5xKv_o8a3XjjvTZ8h63Nu3USB9wNSRULH3jsjYXLDBN6n4tVc2aEjLvHv_eEOaEnPhxxYSw8TKXSI8WSWDkGvtpvUxOcvgei4XDoMoCRHavPy7PTwJBbKHvAyxZNnhx7C5WZPqobAfXB7_BFJ8ALF3klsnmEdRfVExPiiHRCrTUEQcF2J_7uDOAAC-syxS5ixqwBKwnbVdF5kn8aH7-rknvXEaPJ_H3QVUZk8SsCQ03e8436KImnXvTab9Ca5n9YbYnBuJPjNgiawcLFNlC8Ghf2d9EABQEcaAo--WSBGajQauQScLb1JpHn3nseKpEDKwRRCyHGsjiTZkl4sIBn_ebBjDjbFWRzI3ga8PUy_AUGWFJcfZfTdINKJUh_q3TO8Kq6Ab8PpD5GyxKfhYcz-Fip5tQ-6Ip29Z9fVHSTFIdjnCJe1bDbPx9Khtgbso2zca77bY86OaVhlsEdaYPaPq5kiM1floVAKD32wI"
}
```
### Users

```JSON
[
    {
        "name": "Ævar Arnfjörð Bjarmason",
        "login": "avar",
        "company": "",
        "no_of_followers": 30,
        "no_of_publicrepos": 30
    },
    {
        "name": "Shawn O. Pearce",
        "login": "spearce",
        "company": "",
        "no_of_followers": 30,
        "no_of_publicrepos": 8
    },
    {
        "name": "Michael Haggerty",
        "login": "mhagger",
        "company": "GitHub",
        "no_of_followers": 30,
        "no_of_publicrepos": 13
    },
    {
        "name": "Linus Torvalds",
        "login": "torvalds",
        "company": "Linux Foundation",
        "no_of_followers": 30,
        "no_of_publicrepos": 6
    },
    {
        "name": "Junio C Hamano",
        "login": "gitster",
        "company": "Google",
        "no_of_followers": 30,
        "no_of_publicrepos": 11
    },
    {
        "name": "Johannes Schindelin",
        "login": "dscho",
        "company": "@Microsoft",
        "no_of_followers": 30,
        "no_of_publicrepos": 30
    },
    {
        "name": "Jeff King",
        "login": "peff",
        "company": "GitHub",
        "no_of_followers": 30,
        "no_of_publicrepos": 30
    },
    {
        "name": "Duy Nguyen",
        "login": "pclouds",
        "company": "",
        "no_of_followers": 30,
        "no_of_publicrepos": 3
    },
    {
        "name": "",
        "login": "jrn",
        "company": "",
        "no_of_followers": 16,
        "no_of_publicrepos": 0
    },
    {
        "name": "",
        "login": "rscharfe",
        "company": "",
        "no_of_followers": 2,
        "no_of_publicrepos": 3
    }
]
```

### From Github User

```JSON
{
    "login": "gitster",
    "id": 54884,
    "node_id": "MDQ6VXNlcjU0ODg0",
    "avatar_url": "https://avatars.githubusercontent.com/u/54884?v=4",
    "gravatar_id": "",
    "url": "https://api.github.com/users/gitster",
    "html_url": "https://github.com/gitster",
    "followers_url": "https://api.github.com/users/gitster/followers",
    "following_url": "https://api.github.com/users/gitster/following{/other_user}",
    "gists_url": "https://api.github.com/users/gitster/gists{/gist_id}",
    "starred_url": "https://api.github.com/users/gitster/starred{/owner}{/repo}",
    "subscriptions_url": "https://api.github.com/users/gitster/subscriptions",
    "organizations_url": "https://api.github.com/users/gitster/orgs",
    "repos_url": "https://api.github.com/users/gitster/repos",
    "events_url": "https://api.github.com/users/gitster/events{/privacy}",
    "received_events_url": "https://api.github.com/users/gitster/received_events",
    "type": "User",
    "site_admin": false,
    "name": "Junio C Hamano",
    "company": "Google",
    "blog": "http://git-blame.blogspot.com/",
    "location": "Mountain View, CA",
    "email": null,
    "hireable": null,
    "bio": null,
    "twitter_username": null,
    "public_repos": 11,
    "public_gists": 1,
    "followers": 2978,
    "following": 0,
    "created_at": "2009-02-16T08:20:51Z",
    "updated_at": "2021-08-14T04:33:06Z"
}
```

### Humming Distance

```JSON
{"hummingdistance":2}
```


### Errors and Status Codes

If a request fails any validations, expect a 422 and errors in the following format:

```JSON
{"status":404,"message":"The requested resource was not found"}
```

#### Other status codes:

401 for Unauthorized requests, when a request requires authentication but it isn't provided

403 for Forbidden requests, when a request may be valid but the user doesn't have permissions to perform the action

404 for Not found requests, when a resource can't be found to fulfill the request


## Endpoints:

### Registration:

`POST /api/register`

Example request body:
```JSON
{
    "email": "jake@jake.jake",
    "password": "jakejake",
    "name": "jakejake",
}
```

No authentication required, returns a [User](#users-for-authentication)

Required fields: `name`, `email`, `password`


### Authentication:

`POST /api/login`

Example request body:
```JSON
{
    "email": "jake@jake.jake",
    "password": "jakejake"
}
```

No authentication required, returns a [User](#users-for-authentication)

Required fields: `email`, `password`

### Get Current/User From Github

`GET /githubusers`

Example request body:
```JSON
{
    "sort": "asc",
    "usernames[]": "(optional)jakejake",
    "usernames[]": "(optional)jakejake2"
}
```

Authentication required, returns list of Users


### Get Current/User From Github

`GET /githubuser/me` or `GET /githubuser/{githubusername}`

Authentication required, returns a [User](https://api.github.com/users/gitster) from Github using their API



### Compute Humming Distance

`POST /api/hummingdistance`

Example request body:
```JSON
{
    "x": 1,
    "y": 4,
}
```

Authentication required, returns the [HummingDistace](#hd-value)


Required fields: `x`, `y`

