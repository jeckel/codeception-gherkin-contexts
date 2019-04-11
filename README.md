[![Twitter](https://img.shields.io/badge/Twitter-%40jeckel4-blue.svg)](https://twitter.com/jeckel4) [![LinkedIn](https://img.shields.io/badge/LinkedIn-Julien%20Mercier-blue.svg)](https://www.linkedin.com/in/jeckel/) [![CircleCI](https://circleci.com/gh/jeckel/codeception-gherkin-helpers.svg?style=svg)](https://circleci.com/gh/jeckel/codeception-gherkin-helpers) [![codecov](https://codecov.io/gh/jeckel/codeception-gherkin-helpers/branch/master/graph/badge.svg)](https://codecov.io/gh/jeckel/codeception-gherkin-helpers)


# *!! Work in Progress !!* 

# Codeception Gherkin Helpers

A collection a Gherkin helpers to use with Codeception

# Installation & configuration

```bash
composer require --dev jeckel/codeception-gherkin-helpers
```

Then enable module n codeception, update ̀`acceptance.yml` :

```yaml
modules:
  enabled:
    - WebDriver
    - \Test\Support\Helper\Acceptance
    - \Jeckel\Gherkin\WebdriverHelper:
      depends:
        - WebDriver
```
