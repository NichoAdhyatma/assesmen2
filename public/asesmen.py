import speech_recognition as sr
import moviepy.editor
import pandas as pd
import os
import sys
from vaderSentiment.vaderSentiment import SentimentIntensityAnalyzer
from pprint import pprint
from googletrans import Translator, constants
from IPython.core.display import Video
from feat.utils.io import get_test_data_path
from feat import Detector
from feat.detector import Detector
from pydub import AudioSegment



testvar = sys.argv[1]
testvar = testvar.replace("'", '')
# print(testvar)
# video_name = "C:\\xamppMaxy\\htdocs\\assessment-test-lp\\public\\videos\\11\\video1.mp4"
video_name = ""
video_name += testvar
# print(video_name)
audio_name = "C:\\xamppMaxy\\htdocs\\assessment-test-lp\\public\\audiofile\\audio_test.wav"
# video_name = sys.argv[1]
# print(video_name)
def main():
    # actual_duration = calculate_actual_duration(video_name)
    # print(actual_duration)
    # Round the duration to the nearest second
    # rounded_duration = round(actual_duration)
    # print(rounded_duration)
    video = moviepy.editor.VideoFileClip(video_name)
    # video = video.subclip(0, rounded_duration)
    # return actual_duration
    

    # Perform face sentiment analysis on the video
    # video_prediction_df = face_sentiment(video_name)
    # Extract the Audio
    audio = video.audio
    # return audio
    # Export the Audio
    audio.write_audiofile(audio_name)

# def calculate_actual_duration(video_name):
    
#     # Load the video using VideoFileClip
#     video = moviepy.editor.VideoFileClip(video_name)

#     # Get the duration of the video in seconds
#     duration_in_seconds = video.duration

#     # Close the video file
#     video.close()

#     return duration_in_seconds


# Analyst Voice to Text
def voice_sentiment():
    # Initialize recognizer class
    r = sr.Recognizer()
    # make audio object
    audio = sr.AudioFile(audio_name)
    # read audio object and transcribe
    with audio as source:
        audio = r.record(source)
        result = r.recognize_google(audio, language="id-ID")

    # print(result)
    # Translate to ENG
    translator = Translator()
    trans_res = translator.translate(result)
    # print(trans_res)

    # Analyst
    
    Sentence = [str(trans_res)]
    analyser = SentimentIntensityAnalyzer()
    for i in Sentence:
        v = analyser.polarity_scores(i)
    return v


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

    # print(video_prediction_df)
    # Nama CSV
    # csv_file_path = "result.csv"

    # Save Dataframe ke CSV
    # video_prediction_df.to_csv(csv_file_path, index=False)

    # Modifikasi CSV
    # df = pd.read_csv("result.csv")
    # Menambah "contempt" pada CSV dengan rata - rata "AU12 dan AU14"
    # Bisa diubah sesuai kebutuhan
    # df["contempt"] = df.loc[:, ["AU12","AU14"]].mean(axis = 1)
    # Filter kolom pada csv dan simpan pada variabel baru
    # happiness = df["happiness"]
    # Hasil penjumlahan
    # sadness = df["sadness"].sum()
    # Hasil rata - rata
    # contempt = df["contempt"].mean()

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
# print(video)
audio_res = voice_sentiment()
# print(audio_res)
video_prediction_df = face_sentiment(video_name)
negative_score, positive_score, neutral_score, trust_score = resultcalc(video_prediction_df)
# # print(negative_score)
import json
output_data = {
    "neg": audio_res.get('neg', 0.0),
    "neu": audio_res.get('neu', 0.0),
    "pos": audio_res.get('pos', 0.0),
    "compound": audio_res.get('compound', 0.0),
    "negative_score": negative_score,
    "positive_score": positive_score,
    "neutral_score": neutral_score,
    "trust":trust_score,

}
output_json = json.dumps(output_data)

# Return the JSON string as the final output
sys.stdout.write(output_json)
