REGISTER
 - http://127.0.0.1:8000/api/register
 - METHOD POST
 - Payload
  - {
        name:huuhau
        email:haunh11111@abc.net
        password:123456
        password_confirmation:123456
    }

LOGIN
 - http://127.0.0.1:8000/api/login
 - METHOD POST
 - Payload
  - {
        email:haunh11111@abc.net
        password:123456
    }

LOGOUT
 - http://127.0.0.1:8000/api/logout
 - METHOD POST

SHOW
 - http://127.0.0.1:8000/api/users/1
 - METHOD GET

UPDATE
 - http://127.0.0.1:8000/api/users/1
 - METHOD PUT
   - {
        name:huuhau
        email:haunh11111@abc.net
        password:123456
        password_confirmation:123456
    }
