---
name: anti-slop
description: Enforces Anti-Slop code quality guardrails, preventing low-quality AI generated code, bloated abstractions, dummy fallbacks, and silent exception swallowing.
trigger: always_on
---

# Anti-Slop Code Quality Guardrails

## 1. Zero Conversational & Code Slop
- **No Filler Text**: Responses must be direct, technical, and concise. Avoid intros like "Here is your updated code..." or conversational fluff.
- **No Dead Code or Unused Boilerplate**: Do not leave unused imports, dead variables, or empty placeholders in source files.

## 2. Strict Error Handling & Zero Dummy Fallbacks
- **Fix Root Causes**: If an API or query returns null/empty data, trace upstream instead of wrapping in silent try/except or returning dummy zero/empty string fallbacks.
- **No Assertion Deletion**: Never resolve failing tests by commenting out assertions or swallowing exceptions.

## 3. Idiomatic & Pragmatic Code
- **Laravel Best Practices**: Use Eloquent query builder, blade components, Tailwind CSS utility classes, and standard Laravel conventions.
- **No Over-Engineering**: Prefer simple, maintainable solutions over complex abstract layers.

## 4. Verification Mandatory
- Run empirical verification commands (`php artisan route:list`, build tools, or linters) before concluding any task.
