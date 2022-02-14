// This javascript prevent the resubmission of form when refresh button(f5) is click
if (window.history.replaceState) {
    window.history.replaceState (null, null, window.location.href);
}