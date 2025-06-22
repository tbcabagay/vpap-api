## VPAP Portal API
To use, open a terminal and type the following command:
```
curl -i -H "Accept: application/json" -H "Authorization: Bearer <token>" https://api.vpap.portal.com.ph/api/event/latest
```
Include the following config in <code>.env</code> file
```
VPAP_EVENT_ID=
VPAP_API_RATE_LIMIT_PER_MINUTE=
VPAP_DB_CONNECTION=
VPAP_DB_HOST=
VPAP_DB_PORT=
VPAP_DB_DATABASE=
VPAP_DB_USERNAME=
VPAP_DB_PASSWORD=
```
