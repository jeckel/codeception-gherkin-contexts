# Webdriver Helper

## Configuration

```yaml
# File: tests/acceptance.suite.yml
...
modules:
  enabled:
    - WebDriver
    - \Helper\Acceptance
    - \Jeckel\Gherkin\WebdriverHelper:
        depends:
          - WebDriver
```

## Featured steps

This steps are mapped to original `Webdriver Module` functions. See full [Codeception Webdriver documentation](https://codeception.com/docs/modules/WebDriver).


**List of steps already implemented in this helper:**
```gherkin
  Feature: List steps
    Given I am on url "url"
    Given I am on page "page"
    When I make screenshot "name"
    When I resize window to "width" and "height"
    When I click "link"
    When I fill field "field" with "value"
    When I submit form "form"
    Then I should see "text"
    Then I should not see "text"
    Then I should see in source
"""
lorem ipsume...
"""
    Then I should not see in source
"""
lorem ipsume...
"""
    Then I should see link "link"
    Then I should see link "link" with url "url"
    Then I should not see link "link"
    Then I should not see link "link" with url "url"
    Then I should see in current url "uri"
    Then I should not see in current url "uri"
    Then I should see current url equals "uri"
    Then I should not see current url equals "uri"
    Then I should see current url matches "uri"
    Then I should not see current url matches "uri"
```

