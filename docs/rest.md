# Rest Helper

## Configuration

```yaml
# File: tests/acceptance.suite.yml
...
modules:
  enabled:
    - PhpBrowser
    - \Helper\Acceptance
    - REST:
        depends: PhpBrowser
        url: '%APPLICATION_URL%'
    - \Jeckel\Gherkin\RestContext:
        depends: REST
```

## Featured steps

This steps are mapped to original `Rest Module` functions. See full [Codeception REST documentation](https://codeception.com/docs/modules/REST).

**List of steps already implemented in this helper:**
```gherkin
  Feature: List steps
    Given I have http header "header" with value "value"
    When I delete http header "header"
    Then I should see http header "header"
    Then I should see http header "header" with value "value"
    When I send a GET request to "url"
    Then the response status code should be "num"
    Then the response should be in JSON
    Then the JSON should be equal to
"""
{
  "foo": "bar",
  "sum": 12
}
"""
    When I send a POST request to "url" with parameters
      | field    | value        |
      | username | bob          |
      | password | 123Password! |

    When I send a PUT request to "url" with parameters
      | field        | value        |
      | new_username | bob93        |
      | new_email    | foo@bar.com  |
    Then I should see response json matches JsonPath "$.path"
```
