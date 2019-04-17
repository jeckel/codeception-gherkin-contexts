[![Latest Stable Version](https://poser.pugx.org/jeckel/codeception-gherkin-helpers/v/stable)](https://packagist.org/packages/jeckel/codeception-gherkin-helpers)
[![Latest Unstable Version](https://poser.pugx.org/jeckel/codeception-gherkin-helpers/v/unstable)](https://packagist.org/packages/jeckel/codeception-gherkin-helpers)
[![Total Downloads](https://poser.pugx.org/jeckel/codeception-gherkin-helpers/downloads?format=flat)](https://packagist.org/packages/jeckel/codeception-gherkin-helpers)
[![CircleCI](https://circleci.com/gh/jeckel/codeception-gherkin-helpers.svg?style=svg)](https://circleci.com/gh/jeckel/codeception-gherkin-helpers)
[![codecov](https://codecov.io/gh/jeckel/codeception-gherkin-helpers/branch/master/graph/badge.svg)](https://codecov.io/gh/jeckel/codeception-gherkin-helpers)
[![Twitter](https://img.shields.io/badge/Twitter-%40jeckel4-blue.svg)](https://twitter.com/jeckel4)
[![LinkedIn](https://img.shields.io/badge/LinkedIn-Julien%20Mercier--Rojas-blue.svg)](https://www.linkedin.com/in/jeckel/)

# *⚠ Work in Progress ⚠* 

# Codeception Gherkin Helpers

A collection a Gherkin helpers to use with Codeception

# Installation & configuration

```bash
composer require --dev jeckel/codeception-gherkin-helpers
```

Then, to enable this module in codeception, just update `acceptance.yml` file like this:

```yaml
modules:
  enabled:
    - WebDriver
    - \Helper\Acceptance
    - \Jeckel\Gherkin\WebdriverContext:
        depends:
          - WebDriver
```

# Documentation

You can read the [full documentation with list of all proposed steps, configuration, etc.](https://github.com/jeckel/codeception-gherkin-helpers/blob/master/docs/readme.md)

# Issues

If you encounter some issues or want to request additional helpers / steps, you can add new [issues on github](https://github.com/jeckel/codeception-gherkin-helpers/issues).
