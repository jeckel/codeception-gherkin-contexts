[![Latest Stable Version](https://poser.pugx.org/jeckel/codeception-gherkin-contexts/v/stable)](https://packagist.org/packages/jeckel/codeception-gherkin-contexts)
[![Total Downloads](https://poser.pugx.org/jeckel/codeception-gherkin-contexts/downloads?format=flat)](https://packagist.org/packages/jeckel/codeception-gherkin-contexts)
[![CircleCI](https://circleci.com/gh/jeckel/codeception-gherkin-contexts.svg?style=svg)](https://circleci.com/gh/jeckel/codeception-gherkin-contexts)
[![codecov](https://codecov.io/gh/jeckel/codeception-gherkin-contexts/branch/master/graph/badge.svg)](https://codecov.io/gh/jeckel/codeception-gherkin-contexts)
[![FOSSA Status](https://app.fossa.com/api/projects/git%2Bgithub.com%2Fjeckel%2Fcodeception-gherkin-contexts.svg?type=shield)](https://app.fossa.com/projects/git%2Bgithub.com%2Fjeckel%2Fcodeception-gherkin-contexts?ref=badge_shield)
[![Twitter](https://img.shields.io/badge/Twitter-%40jeckel4-blue.svg)](https://twitter.com/jeckel4)
[![LinkedIn](https://img.shields.io/badge/LinkedIn-Julien%20Mercier--Rojas-blue.svg)](https://www.linkedin.com/in/jeckel/)

# *⚠ Work in Progress ⚠* 

# Codeception Gherkin Helpers

A collection a Gherkin helpers to use with Codeception

# Installation & configuration

```bash
composer require --dev jeckel/codeception-gherkin-contexts
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

You can read the [full documentation with list of all proposed steps, configuration, etc.](https://github.com/jeckel/codeception-gherkin-contexts/blob/master/docs/readme.md)

# Issues

If you encounter some issues or want to request additional helpers / steps, you can add new [issues on github](https://github.com/jeckel/codeception-gherkin-contexts/issues).


## License
[![FOSSA Status](https://app.fossa.io/api/projects/git%2Bgithub.com%2Fjeckel%2Fcodeception-gherkin-contexts.svg?type=large)](https://app.fossa.io/projects/git%2Bgithub.com%2Fjeckel%2Fcodeception-gherkin-contexts?ref=badge_large)
