---
name: anti-slop
description: Anti-Slop Code Quality & Refactoring Guardrail Skill for auditing and purging AI slop code, bloated abstractions, and silent error swallowers.
---

# Anti-Slop Code Quality Skill

Use this skill when auditing the codebase for low-quality AI-generated code ("slop"), removing bloated boilerplate, eliminating silent error handlers, or enforcing strict coding standards.

## Audit Checklist:

### 1. Check for Silent Error Swallowing & Dummy Fallbacks
- Search for `try { ... } catch (\Throwable $e) {}` or `catch (\Exception $e) { return null; }` that hide runtime bugs.
- Replace silent swallowers with proper logging (`Log::error($e->getMessage())`) or explicit exception throwing.

### 2. Purge Dead Code & Unused Boilerplate
- Audit controllers and models for unused imports, dead functions, or duplicate helper methods.
- Audit Blade templates for orphaned Tailwind classes or inline style overrides.

### 3. Verify Framework Idioms
- Ensure Eloquent relationships and scope queries are used efficiently without redundant N+1 queries.
- Ensure all routes in `routes/web.php` use named routes and proper middleware.

### 4. Verification Runbook
Run the following verification commands to ensure zero slop:
```bash
php artisan route:list
git status
```
