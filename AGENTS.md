# Codex Project Rules

- `SPEC.md` is the source of truth for the Plain Log V1 product and technical
  specification. Before every coding task, read the sections relevant to the
  task.
- Keep the requested scope exact. Do not add adjacent features or any V1
  non-goal. If a request conflicts with `SPEC.md`, stop and report the conflict;
  do not reinterpret the specification.
- The Theme owns presentation only. It must not change WordPress site behavior,
  configuration, security policy, SEO settings, or database schema.
- Add no third-party runtime or build dependency. Do not add npm, Composer, a
  package manifest, or a build system.
- Prefer WordPress Core behavior and APIs. Do not broadly dequeue or remove Core
  behavior merely to produce "clean" source.
- Use semantic HTML, progressive enhancement, accessible controls, keyboard
  support, and visible focus states. Core functionality must work without
  JavaScript.
- Keep changes small, clear, and reviewable.
- After code changes, run the most relevant checks available in the repository.
  If no automated test exists, state the verification limitation; never claim a
  check passed when it was not run.
- Do not modify `README.md`, `SPEC.md`, or `AGENTS.md` unless the current task
  explicitly requires it.
- Do not create, modify, or delete Git remotes. Do not push, force-push, rebase
  shared history, or change GitHub settings unless the user explicitly requests
  it in the current task.
