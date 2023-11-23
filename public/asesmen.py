import moviepy.editor
import pandas as pd
import os
import sys
from pprint import pprint
from IPython.core.display import Video
from feat.detector import Detector

testvar = sys.argv[1]
testvar = testvar.replace("'", '')

video_name = ""
video_name += testvar


