const Project = {
  /**
   * @param callbackFunc
   */
  ready(callbackFunc) {
    const readyFunction = () => {
      callbackFunc();
    };

    if (document.readyState !== 'loading') {
      readyFunction();
    } else if (document.addEventListener) {
      document.addEventListener('DOMContentLoaded', readyFunction);
    } else {
      document.attachEvent('onreadystatechange', () => {
        if (document.readyState === 'complete') {
          readyFunction();
        }
      });
    }
  },
};

export default Project;
