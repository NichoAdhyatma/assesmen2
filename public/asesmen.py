import speech_recognition as sr
import moviepy.editor
import pandas as pd
import os
import sys
from vaderSentiment.vaderSentiment import SentimentIntensityAnalyzer
from pprint import pprint
from IPython.core.display import Video
from feat import Detector
# from feat import Detector
# from feat.detector import Detector

testvar = sys.argv[1]
testvar = testvar.replace("'", '')

video_name = ""
video_name += testvar


def main():
    video = moviepy.editor.VideoFileClip(video_name)


def face_sentiment(video_path):
    # Make Object detector
    detector = Detector()
    # Import video 
    test_video_path = video_path
    Video(test_video_path, embed=False)
    video_prediction = detector.detect_video(test_video_path, skip_frames=30)

    # Convert ke dataframe
    video_prediction_df = pd.DataFrame(video_prediction)
    return video_prediction_df

def resultcalc(video_prediction_df):
    video_prediction_df = video_prediction_df.astype({'anger': 'float64', 'disgust': 'float64', 'fear': 'float64', 'sadness': 'float64', 'happiness': 'float64', 'surprise': 'float64', 'neutral': 'float64', 'AU12': 'float64', 'AU14': 'float64'})

    # Continue to work with the provided DataFrame...
    # Example calculations using the DataFrame:
    negative_score = video_prediction_df[["anger", "disgust", "fear", "sadness"]].mean().mean()
    positive_score = video_prediction_df[["happiness", "surprise"]].mean().mean()
    neutral_score = video_prediction_df["neutral"].mean()
    trust_score = video_prediction_df[["AU12", "AU14"]].mean().mean()

    return negative_score, positive_score, neutral_score, trust_score


main()
video_prediction_df = face_sentiment(video_name)
negative_score, positive_score, neutral_score, trust_score = resultcalc(video_prediction_df)
negative_score = round(negative_score, 3)
positive_score = round(positive_score, 3)
neutral_score = round(neutral_score, 3)
trust_score = round(trust_score, 3)

# # print(negative_score)
import json
output_data = {
    "negative_score": negative_score,
    "positive_score": positive_score,
    "neutral_score": neutral_score,
    "trust": trust_score
}
output_json = json.dumps(output_data)

# Return the JSON string as the final output
sys.stdout.write(output_json)
