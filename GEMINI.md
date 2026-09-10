# Anti-Slop Code Quality Guidelines (STIKes Panti Waluya Malang CMS)

This repository enforces strict Anti-Slop rules for AI-assisted code generation and maintenance.

## Core Anti-Slop Principles:

1. **No Filler & Conversational Bloat**:
   - Deliver direct, concise, production-ready code changes without unnecessary pleasantries, boilerplate intros, or repetitive explanations.

2. **No Superficial Symptom Patches & Dummy Fallbacks**:
   - Never solve errors by swallowing exceptions with silent `try/catch` blocks, returning fake dummy fallbacks (`return ""`, `return 0`), or commenting out failing assertions.
   - Always trace root causes to their source data providers.

3. **No Unnecessary Abstractions or Over-Engineering**:
   - Write clean, pragmatic, idiomatic PHP/Laravel & JavaScript.
   - Avoid creating redundant helper classes, unused interfaces, or deep wrapper hierarchies when standard framework utilities exist.

4. **Empirical Verification Required**:
   - Never claim code is working without running verification commands (`php artisan route:list`, `php artisan test`, `git status`).

5. **Preserve Code Integrity & Documentation**:
   - Preserve existing comments and docstrings.
   - Do not guess schemas, types, or API signatures without reading authoritative source files.
